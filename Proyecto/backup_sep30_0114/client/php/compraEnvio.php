<?php ini_set('display_errors','on');

$servername = "localhost";
$username = "id2689058_sgviddb";
$password = "distributedDB";
$database = "id2689058_sgviddb";

// RESCATANDO ALL VALUES

	foreach($_POST as $nombre_campo => $valor){ 
		$asignacion = "\$".$nombre_campo."='".trim($valor)."';"; 
		eval($asignacion); 
    	}

// CREATE AND CHECK CONNECTION
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");

//STARTS PROGRAM
	session_start();
	
	//FOR SAVE COMPRA, MODELOCOMPRA, and ORDEN ENVIO
	$user = $_SESSION['correo'];
	$carro = $_SESSION['carritoDan'];
	$idCompra = 0;
	$fecha = getDate()['year']."-".getDate()['mon']."-".getDate()['mday'];
	//$fechaEst = getDate()['year']."-".(getDate()['mon']+1)."-01";
	$preciototal = 0.0;
	$inserts = array();
	$inserts2 = array();
	$inserts3 = array(); // not used
	$inserts4 = array();

	$sql = "SELECT MAX(id) AS id FROM Compra";
	$resultado = mysqli_query($conn, $sql);
	$idCompra = mysqli_fetch_assoc($resultado)['id']+1;
//echo "<br>".$sql."<br>";
	
	$sql = "SELECT MAX(operacion) AS id FROM Rotacion";
	$resultado = mysqli_query($conn, $sql);
	$operacion = mysqli_fetch_assoc($resultado)['id']+1;
//echo "<br>".$sql."<br>";

	for ($x = 0; $x < sizeof($carro); $x++) {
	
		$modelo = $carro[$x]['mod'];
	
		$sql = "SELECT A.idAlmacen, MAX(entradas - COALESCE(salidas,0)) AS Mayor FROM 

			( SELECT idAlmacen, SUM(Rotacion.cantidad) AS entradas
			FROM Rotacion, Lote
			WHERE idlote=lote
			AND entrada=1
			AND idModelo='$modelo' GROUP BY idAlmacen ) AS A
	
			LEFT JOIN
	
			( SELECT idAlmacen, SUM(Rotacion.cantidad) AS salidas
			FROM Rotacion, Lote
			WHERE idlote=lote
			AND entrada=0
			AND idModelo='$modelo' GROUP BY idAlmacen ) AS B
	
			ON A.idAlmacen=B.idAlmacen";

		$resultado = mysqli_query($conn, $sql);
		$existencias = mysqli_fetch_assoc($resultado);
//echo "<br>".$sql."<br>";

//echo "<br>carro: ".$carro[$x]['num']."<br>";
//echo "<br>existencias: ".$existencias['Mayor']."<br>";
		if($carro[$x]['num']<=$existencias['Mayor']){
			$sql= "SELECT precio,descuento FROM Modelo WHERE Modelo='$modelo'";
			$resultado = mysqli_query($conn, $sql);
			$info = mysqli_fetch_assoc($resultado);
			
			$precio = $info['precio'];
			$descuento = $info['descuento'];
			$preciototal = $carro[$x]['num']*$precio*(1.0-$descuento)+$preciototal;
		
		
			$sql = "SELECT A.idAlmacen, A.idLote, entradas - COALESCE(salidas,0) AS Neto FROM 

				( SELECT idAlmacen, idLote, SUM(Rotacion.cantidad) AS entradas
				FROM Rotacion, Lote
				WHERE idlote=lote
				AND entrada=1
				AND idModelo='$modelo'
				AND idAlmacen=".$existencias['idAlmacen']." GROUP BY idLote ) AS A
	
				LEFT JOIN
	
				( SELECT idAlmacen, idLote, SUM(Rotacion.cantidad) AS salidas
				FROM Rotacion, Lote
				WHERE idlote=lote
				AND entrada=0
				AND idModelo='$modelo'
				AND idAlmacen=".$existencias['idAlmacen']." GROUP BY idLote ) AS B
	
				ON A.idLote=B.idLote";
				
			$resultado = mysqli_query($conn, $sql);
			
			// INSERTS : Rotacion, CompraMueble
			while($lote = mysqli_fetch_assoc($resultado)){
				
				if($carro[$x]['num']>$lote['Neto']){
					$inserts[] = "INSERT INTO Rotacion VALUES ($operacion,".$lote['idLote'].",".$lote['idAlmacen'].",".$lote['Neto'].",'$fecha','Compra de Muebles',0)";
					$carro[$x]['num'] = $carro[$x]['num'] - $lote['Neto'];
					
					$inserts2[] ="INSERT INTO CompraMueble VALUES ($idCompra,$operacion,$precio,$descuento)";
					$operacion = $operacion + 1;
				}else{
					$inserts[] = "INSERT INTO Rotacion VALUES ($operacion,".$lote['idLote'].",".$lote['idAlmacen'].",".$carro[$x]['num'].",'$fecha','Compra de Muebles',0)";
					
					$inserts2[] ="INSERT INTO CompraMueble VALUES ($idCompra,$operacion,$precio,$descuento)";
					$operacion = $operacion + 1;
					break;
				}
			}

		}else{
			echo 0; exit;
		}

	}

	for ($x = 0; $x < sizeof($inserts); $x++) {
		$resultado = mysqli_query($conn,$inserts[$x]);
		if(mysqli_affected_rows($conn)==0){ echo -1; exit; }
//echo "<br>".$inserts[$x]."<br>";
	}

	$sql = "INSERT INTO Compra 
		VALUES (".$idCompra.",'".$user."',".$preciototal.",".$preciototal*0.16.",'".$fecha."')";
	$resultado = mysqli_query($conn,$sql);
//echo "<br>".$sql."<br>";
	
	if(mysqli_affected_rows($conn)==0){ echo -2; exit; }
	
	for ($x = 0; $x < sizeof($inserts2); $x++) {
		$resultado = mysqli_query($conn,$inserts2[$x]);
		if(mysqli_affected_rows($conn)==0){ echo -3; exit; }
//echo "<br>".$inserts2[$x]."<br>";
	}

	// INSERTS : Envio
	$sql = "SELECT idAlmacen, idCompra, SUM(cantidad) AS cantidad 
		FROM Compra, CompraMueble, Rotacion
		WHERE Compra.id=idCompra
		AND idCompra=".$idCompra."
		AND idCliente='".$user."'
		AND idOperacion=operacion 
		GROUP BY idAlmacen";
	$resultado = mysqli_query($conn, $sql);
			
	while($ordenes = mysqli_fetch_assoc($resultado)){
		$inserts4[] = "INSERT INTO Envio 
		VALUES ($idCompra,".$ordenes['idAlmacen'].",null,'$codpost','".$calle." #".$noExt." - ".$noInt."',".$ordenes['cantidad'].")";
	}
//echo "<br>".$sql."<br>";
	
	for ($x = 0; $x < sizeof($inserts4); $x++) {
		$resultado = mysqli_query($conn,$inserts4[$x]);
		if(mysqli_affected_rows($conn)==0){ echo -4; exit; }
//echo "<br>".$inserts4[$x]."<br>";
	}
	echo 1;
	unset($_SESSION['carritoDan']);
	exit;
?>
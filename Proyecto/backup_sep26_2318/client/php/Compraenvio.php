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
	$echo = "";
	
	//FOR SAVE COMPRA, MODELOCOMPRA, and ORDEN ENVIO
	$user = $_SESSION['correo'];
	$carro = $_SESSION['carritoDan'];
	$idCompra = 0;
	$fecha = getDate()['year']."-".getDate()['mon']."-".getDate()['mday'];
	$fechaEst = getDate()['year']."-".(getDate()['mon']+1)."-01";
	$preciototal = 0.0;
	$inserts = array();

	$sql = "SELECT COUNT(*) AS id FROM Compra";
	$resultado = mysqli_query($conn, $sql);
	$idCompra = mysqli_fetch_assoc($resultado)['id']+1;
	
	$sql = "SELECT COUNT(*) AS id FROM Rotacion";
	$resultado = mysqli_query($conn, $sql);
	$operacion = mysqli_fetch_assoc($resultado)['id']+1;

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

		if($carro[$x]['num']<$existencias['Mayor']){
		
			$sql = "INSERT INTO CompraMueble
				VALUES ($operacion,null,$existencias['idAlmacen'],$carro[$x]['num']),'".$fecha."','Compra de muebles',0";
			
// INSERTS

			$sql= "SELECT precio,descuento FROM Modelo WHERE Modelo='$modelo'";
			$resultado = mysqli_query($conn, $sql);
			$info = mysqli_fetch_assoc($resultado);
			
			$precio = $info['precio'];
			$descuento = $info['descuento'];
			$inserts[] = "INSERT INTO CompraMueble 
				VALUES ('".$modelo."',".$idCompra.",".$precio.",".$descuento.",".$carro[$x]['num'].",".
				$existencias['idAlmacen'].")";
				
			$preciototal = $carro[$x]['num']*$precio*(1.0-$descuento) +$preciototal;
		}

	}
/*
	$sql = "INSERT INTO Compra
	VALUES (".$idCompra.",'".$fecha."',".$preciototal.",".$preciototal*0.16.",'".$user."')";
	
	$resultado = mysqli_query($conn,$sql);
	
	if(mysqli_affected_rows($conn)==0){ echo 0; exit; }
	
	for ($x = 0; $x < sizeof($inserts); $x++) {
	
		$resultado = mysqli_query($conn,$inserts[$x]);
		if(mysqli_affected_rows($conn)==0){ echo -1; exit; }
		
	}
	
	$sql = "INSERT INTO OrdenEnvio 
		VALUES (".$existencias['idAlmacen'].",idCompra,'$fechaEst',null,'A','$calle','$noInt','$codpost')";
		
	$resultado = mysqli_query($conn,$sql);
	
	if(mysqli_affected_rows($conn)==0){ echo -1; exit;}
	
	echo 1;

	unset($_SESSION['carritoDan']);
	exit;
*/
?>

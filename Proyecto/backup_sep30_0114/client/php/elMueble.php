<?php ini_set('display_errors','on');

$servername = "localhost";
$username = "id2689058_sgviddb";
$password = "distributedDB";
$database = "id2689058_sgviddb";

// CREATE AND CHECK CONNECTION
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");

//STARTS PROGRAM

	$modelo = $_POST["modelo"];
	
	$txtModelo = "<p>Modelo: <b> $modelo</b></p>";

	//Para ver las existencias

	$sqlExistencias = "SELECT A.idmodelo, (entradas - COALESCE(salidas,0)) AS existencias
	FROM
		( SELECT idmodelo, SUM(Rotacion.cantidad) as entradas
		FROM Rotacion, Lote
		WHERE idlote=lote
		AND entrada=1
		AND idModelo='".$modelo."') AS A
			
    		LEFT JOIN 
    				
		(SELECT idmodelo, SUM(Rotacion.cantidad) as salidas
		FROM Rotacion, Lote
		WHERE idlote=lote
		AND entrada=0
		AND idModelo='".$modelo."') AS B
   
		ON A.idmodelo=B.idmodelo;";

	$resExistencias  = mysqli_query($conn, $sqlExistencias);
	$Model = $resExistencias->fetch_assoc();
					
	$muebleExistencias = "<p class='exist center'>Existencias: ".$Model['existencias']."</p><br>";


	$sqlAcab = "SELECT nombre
		FROM AcabadoModelo,Acabado
		WHERE idModelo='$modelo'
		AND idAcabado=id";
		
	$Acabados = "<td>Acabado:</td>";	
	$resultadoAcab = mysqli_query($conn, $sqlAcab);
	while($filas = mysqli_fetch_array($resultadoAcab, MYSQLI_BOTH)){
		$Acabados .= "<td>$filas[0]</td>";
	}
	
	
	$sql = "SELECT idModelo, nombre
		FROM Categoria, CategoriaModelo
		WHERE idModelo='".$modelo."' AND idCat=id";
	
	$resultado = mysqli_query($conn, $sql);
	$cat = array();
	while($row = mysqli_fetch_assoc($resultado)) {
		$cat[] = $row;
	}
	
	$categoria = "";
	for ($i = 0; $i < count($cat); $i++){
	
		if( $i!=0 ){  $categoria .= "<br>";  }
		$categoria .= $cat[$i]['nombre'];
	}
	

	$sql = "SELECT * FROM Modelo where modelo='$modelo'";
	$resultado = mysqli_query($conn, $sql);
	$Mueble = $resultado->fetch_assoc();
	
	$catMueble="<li>Categor&iacute;a: <b>".$categoria."</b></li>";
		
	$nombreMueble = '<h4>'.$Mueble['nombre'].'</h4>';
	$precioMueble = $Mueble['precio'];
	$dimenAlto = $Mueble['dimenAlto'];
	$dimenAncho = $Mueble['dimenAncho'];
	$dimenProfundidad = $Mueble['dimenProfun'];
	$descripMueble = '<p>'.$Mueble['descrip'].'</p>';
	$descMueble = $Mueble['descuento'];
	$fotoMueble = '<img class="responsive-img" src="img/'.$Mueble['foto'].'">';
	$Medidas = "<td>Medidas:</td><td><b>Alto:</b> $dimenAlto mts. <b>Ancho:</b> $dimenAncho mts. <b>Largo:</b> $dimenProfundidad mts. </td>";
	
	if($descMueble==0){
		$money = "<b> $  $precioMueble MXN  </b><br><br>";}
	else{
		$descontado = $precioMueble * (1-$descMueble);
		$aDescontar = $descMueble *100;
		$money = "<span class='price'> $  $precioMueble MXN   </span><br> <b> Descuento: $aDescontar %  </b><br><b class='s1 discount'>$ $descontado MXN</b>"; //<br>x2
	}
	
	$obj =new stdClass();
	$obj->Modelo=$txtModelo;
	$obj->Categoria=$catMueble;
	$obj->Precio=$money;
	$obj->Medidas=$Medidas;
	$obj->Acabados=$Acabados;
	$obj->Foto=$fotoMueble;
	$obj->Nombre=$nombreMueble;
	$obj->Descripcion=$descripMueble;
	$obj->Existencias=$muebleExistencias;

	echo json_encode($obj);
?>
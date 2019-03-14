<?php ini_set('display_errors','off');

$servername = "localhost";
$username = "id1895415_sgvi";
$password = "sgviWH";
$database = "id1895415_sgvi";

// RESCATANDO ALL VALUES
/*
	foreach($_POST as $nombre_campo => $valor){ 
		$asignacion = "\$".$nombre_campo."='".trim($valor)."';"; 
		eval($asignacion); 
    }
$x = $_POST["id"];*/

// CREATE AND CHECK CONNECTION
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");

//STARTS PROGRAM
	session_start();

	$user = $_SESSION["correo"];

	$sql = "SELECT idAlmacen,idCompra,fechaEstimada,fechaEntrega,estatus,dirCalle,dirNumero,dirCP FROM OrdenEnvio,Compra WHERE idCompra=id AND idCliente='$user'";
	
	$resultado = mysqli_query($conn, $sql);
	//$numFilas = mysqli_num_rows($resultado);
		
	$encode = array();
	while($row = mysqli_fetch_assoc($resultado)) {
   		$encode[] = $row;
	}
        

	for ($x = 0; $x < count($encode); $x++) {
        $sql1 = "SELECT sum(numero) AS num FROM ModeloCompra WHERE idCompra='".$encode[$x]['idCompra']."'";
        $resultado1 = mysqli_query($conn, $sql1);
	
		
	$encode1 = array();
	while($row1 = mysqli_fetch_assoc($resultado1)) {
   		$encode1[] = $row1;
	}

        $sql2 = "SELECT precioTotal,iva FROM Compra WHERE id='".$encode[$x]['idCompra']."'";
        $resultado2 = mysqli_query($conn, $sql2);
	
		
	$encode2 = array();
	while($row2 = mysqli_fetch_assoc($resultado2)) {
   		$encode2[] = $row2;
	}
	$precio = $encode2[0]['iva'];
        $precio = number_format($precio,2,'.',',');
    	$resp .= "<tr>
			<td>".$encode[$x]['idCompra']."</td>
			<td>".$encode1[0]['num']."</td>
			<td>".$encode[$x]['estatus']."</td>
			<td>".$encode[$x]['fechaEstimada']."</td>
			<td>".$encode[$x]['fechaEntrega']."</td>
                        <td>$ ".$precio." MXN</td>
			<td><button class='btn' id='pdf-".$encode[$x]['idCompra']."'>PDF</button></td>
		</tr>"; } 

	echo $resp;
exit;
?>

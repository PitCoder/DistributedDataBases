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
	session_start();

	$ordenes = array();
	$user = $_SESSION["correo"];
	$resp = "";
	
	$sql = "SELECT id,idAlmacen,dir,cp,cantMuebles,total,iva,fecha,fechaEnt
		FROM Envio,Compra
		WHERE idCompra=id 
		AND idCliente='$user' 
		ORDER BY 1,2"; 
	
	$resultado = mysqli_query($conn, $sql);	
	while($row = mysqli_fetch_assoc($resultado)) {
   		$ordenes[] = $row;
	}
        

	for ($x = 0; $x < count($ordenes); $x++) {

		$precio = $ordenes[$x]['total']+$ordenes[$x]['iva'];
        	$precio = number_format($precio,2,'.',',');
        	
        	if($ordenes[$x]['fechaEnt']==null || $ordenes[$x]['fechaEnt']=="")
	        	$fechaEnt = "Pendiente";
	        else
	        	$fechaEnt = $ordenes[$x]['fechaEnt'];
        	
	    	$resp .= "<tr>
				<td>".$ordenes[$x]['id']."</td>
				<td>".$ordenes[$x]['idAlmacen']."</td>
				<td>".$ordenes[$x]['dir']."<br>cp:".$ordenes[$x]['cp']."</td>
				<td>".$ordenes[$x]['cantMuebles']."</td>
	                        <td>$ ".$precio." MXN</td>
				<td>".$ordenes[$x]['fecha']."</td>
				<td>".$fechaEnt."</td>
				<td><button class='btn' id='pdf-".$ordenes[$x]['id']."'>PDF</button></td>
			</tr>";
	} 
	
	echo $resp;
exit;
?>
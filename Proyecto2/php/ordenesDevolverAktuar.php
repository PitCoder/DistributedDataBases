<?php ini_set('display_errors','on');

	include('TAktuarDB.php');
	
//STARTS PROGRAM
	$fecha = getDate()['year']."-".getDate()['mon']."-".getDate()['mday'];
	$operacionesN = $_POST['operacionesN'];
	$operacionesA = $_POST['operacionesA'];
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");
	
	for($j=0; $j<count($operacionesN);$j++)
		{
			$sql = 'UPDATE Pedido set oper2 = '.$operacionesN[$j].' where oper1 = '.$operacionesA[$j];
			$res = mysqli_query($conn, $sql);
			
			$sql = 'UPDATE Pedido set Fecha_entrega = '.$fecha.' where oper1 = '.$operacionesA[$j];
			$res = mysqli_query($conn, $sql);
		}
	echo mysqli_affected_rows($conn);
	
	
?>
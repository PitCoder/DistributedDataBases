<?php ini_set('display_errors','on');

	include('TAktuarDB.php');
	include('classes.php');
	
//STARTS PROGRAM
	$fecha = getDate()['year']."-".getDate()['mon']."-".getDate()['mday'];
	$obra = $_POST['obra'];
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");
	
	$sql = 'UPDATE Pedido SET fecha_llegada="'.$fecha.'" WHERE id_obra="'.$obra.'"';
	$res = mysqli_query($conn, $sql);
		
	echo mysqli_affected_rows($conn);
	
	
?>
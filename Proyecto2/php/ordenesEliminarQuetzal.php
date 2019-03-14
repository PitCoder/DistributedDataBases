<?php ini_set('display_errors','on');

	include('MQuetzalDB.php');
	include('classes.php');
	
//STARTS PROGRAM
	$operaciones = $_POST['operaciones'];
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");
	
	
	for($j=0; $j<count($operaciones);$j++)
		{
			$sql = 'DELETE FROM Rotacion where operacion='.$operaciones[$j];
			$res = mysqli_query($conn, $sql);
		}
		
	echo mysqli_affected_rows($conn);
	
	
?>
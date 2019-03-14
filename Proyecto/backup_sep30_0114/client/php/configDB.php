<?php
	$servername = "localhost";
	$username = "id1895415_sgvi";
	$password = "sgviWH";
	$database = "id1895415_sgvi";
	
	$conexion = mysqli_connect($servername ,$username ,$password ,$database);
	mysqli_query($conexion, "SET NAMES 'utf8'");
	if(mysqli_connect_errno()){
		die("Problemas con la conexi&oacute;n a la BD: ".mysqli_connect_error());
	}
exit;
?>
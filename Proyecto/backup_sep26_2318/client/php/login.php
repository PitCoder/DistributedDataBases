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

	$contrasenaU = md5($contrasenaU);
	$sql = "SELECT correo FROM Cliente WHERE password='$contrasenaU' AND correo='$correoU'";
	$resultado = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($resultado)==1){
		$_SESSION["correo"]=$correoU;
	}

echo mysqli_num_rows($resultado);
exit; ?>

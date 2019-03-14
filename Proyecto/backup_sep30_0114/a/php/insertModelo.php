<?php ini_set('display_errors','on');

$servername = "localhost";
$username = "id2689058_sgviddb";
$password = "distributedDB";
$database = "id2689058_sgviddb";

/* https://stackoverflow.com/questions/3586919/why-would-files-be-empty-when-uploading-files-to-php

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

$imagename=$_FILES["foto"]["name"]; 
$imagetmp=addslashes (file_get_contents($_FILES['foto']['tmp_name']));

	$sql = "INSERT INTO Modelo VALUES 
('$modelo','$nombre','$foto','$alto','$ancho','$prof','$desc',null,null,null)";
	$resultado = mysqli_query($conn, $sql);

	echo mysqli_affected_rows($conn);
echo json_encode($_POST);
*/
/*
$imagename=$_FILES["myimage"]["name"]; 
$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

//Insert the image name and image content in image_table
$insert_image="INSERT INTO image_table VALUES('$imagetmp','$imagename')";

echo $insert_image;
*/
if(isset($_FILES['myimage'])){
echo 1;
} else
{echo json_encode($_FILES);}

exit; ?>
<?php ini_set('display_errors','on');

// RESCATANDO ALL VALUES

	foreach($_POST as $nombre_campo => $valor){ 
		$asignacion = "\$".$nombre_campo."='".trim($valor)."';"; 
		eval($asignacion);
	}
	
	include('classes.php');
	
//STARTS PROGRAM

	session_start();
	
	$_SESSION['user'] = new Usuario($id,$contrasena);
	
	if($_SESSION['user']->esValido()){
		echo 1;
	}
	else{
        session_unset();
		echo 0;
	}
	
	exit;
?>

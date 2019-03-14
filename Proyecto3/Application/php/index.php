<?php ini_set('display_errors','on');

// RESCATANDO ALL VALUES

	foreach($_POST as $nombre_campo => $valor){ 
		$asignacion = "\$".$nombre_campo."='".trim($valor)."';"; 
		eval($asignacion);
	}
	
	include('classes/Administrador.php');
	
//STARTS PROGRAM

	session_start();
    //$_SESSION['user'] = new Usuario('OEZD970313HDF');
	
	//if($_SESSION['user']->esValido('distributedDB')){
	
	$_SESSION['user'] = new Usuario($id);
	if($_SESSION['user']->esValido($contrasena)){
	    if($_SESSION['user']->esAdministrador())
	        $_SESSION['admin'] = new Administrador($id);
	        
		echo 1;
	}
	else{
        session_unset();
		echo 0;
	}
	
	exit;
?>

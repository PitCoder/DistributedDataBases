<?php ini_set('display_errors','on');

// RESCATANDO ALL VALUES

	foreach($_POST as $nombre_campo => $valor){ 
		$asignacion = "\$".$nombre_campo."='".trim($valor)."';"; 
		eval($asignacion);
	}
	
	include('classes/Administrador.php');
	
//STARTS PROGRAM

	session_start();
	
	$administrador = $_SESSION['admin'];
	$anteriores=$administrador->saberPredicadosSimples();
	$administrador->getControla()->quitarPredicadoSimple($eliminar);
	$nuevos=$administrador->saberPredicadosSimples();
	if(count($anteriores)==count($nuevos)+1)
		{
			echo 1;
		}
	else
		{
			echo 0;
		}
	exit;
?>

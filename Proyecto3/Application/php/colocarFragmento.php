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
	if($administrador -> colocarFragmento($id,$sitio))
	    {
	        echo 1;
	    }
	else
	    {
	        echo 2;
	    }
	//$colocar = $administrador->getFragmento($id);
	
	//include('clases/MQsitio2.php');
	
	//echo $colocar->getInsert();
	//echo $colocar->getCreate();
	
	exit;
?>

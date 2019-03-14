<?php ini_set('display_errors','on');

// RESCATANDO ALL VALUES

	foreach($_POST as $nombre_campo => $valor){ 
		$asignacion = "\$".$nombre_campo."='".trim($valor)."';"; 
		eval($asignacion);
	}
	
	include('classes/Base.php');
	include('classes/Vertical.php');
	include('classes/Administrador.php');
	//include('classes/Usuario.php');
	
//STARTS PROGRAM

	session_start();
    
    $data = $_SESSION['admin']->getGeneralOrigen();
    $relacion = $_SESSION['base']->getRelacion($data);
    
    if($_SESSION['admin']->completenessV($relacion)) 
        echo "1";
    else
        echo "0";

	//echo $Relacion->getNombre();

	
	// RESPONSE TO USER INTERFACE
	
	
	exit;

?>

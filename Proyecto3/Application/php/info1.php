<?php ini_set('display_errors','on');

// RESCATANDO ALL VALUES

	foreach($_POST as $nombre_campo => $valor){ 
		$asignacion = "\$".$nombre_campo."='".trim($valor)."';"; 
		eval($asignacion);
	}
	
	include('classes/Base.php');
	include('classes/Administrador.php');
	
//STARTS PROGRAM

	session_start();
	$_SESSION['base'] = new Base($_POST['base']);
	//$_SESSION['base']->setAtributosF();
	
	$relacion = $_SESSION['base']->getRelaciones();
	//$relacion = $_SESSION['base']->getRelacion('Acabado');
	//$relacion->setAtributos();
	//$atributo = $relacion->getAtributos();
	
	// PREPARING RESPONSE TO UI
	$echo = "";
	for($i=0;$i<count($relacion);$i++)
	
	        $echo .= '<option value="'.$relacion[$i]->getNombre().'">'.$relacion[$i]->getNombre().'</option>';
	
	echo $echo;
    
	exit;

?>

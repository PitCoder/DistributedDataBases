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
	$_SESSION['admin']->resetCrea();
	$_SESSION['counter']=1;
	
	
	$relacion = $_SESSION['base']->getRelacion($data);
	//$relacion = $_SESSION['base']->getRelacion('Acabado');
	$relacion->setAtributos();
	$atributo = $relacion->getAtributos();
	
	// PREPARING RESPONSE TO UI
	$echo = "";
	for($i=0;$i<count($atributo);$i++)
	
	    if($atributo[$i]->esPK())   // SHOULD ASK IF ATTRIBUTE IS PK (OR PART OF)
	        $echo .= '<option class="PK" selected value="'.$atributo[$i]->getNombre().'">'.$atributo[$i]->getNombre().'</option>';
	    else
	        $echo .= '<option value="'.$atributo[$i]->getNombre().'">'.$atributo[$i]->getNombre().'</option>';
	
	echo $echo;
    
	exit;

?>

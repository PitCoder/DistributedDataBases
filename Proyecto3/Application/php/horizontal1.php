<?php ini_set('display_errors','on');

// RESCATANDO ALL VALUES
/*
	foreach($_POST as $nombre_campo => $valor){ 
		$asignacion = "\$".$nombre_campo."='".trim($valor)."';"; 
		eval($asignacion);
	}*/
	require_once('classes/Administrador.php');
	require_once('classes/Base.php');
	
//STARTS PROGRAM

	session_start();
	
	$_SESSION['admin']->resetCrea();
	$_SESSION['admin']->resetPredicadosSimples();
	$_SESSION['counter']=1;
	$_SESSION['base'] = new Base(0);
	
	$relaciones = $_SESSION['base']->getRelaciones();
	
	$echo = "";
	for($i=0;$i<count($relaciones);$i++)
	
	    if($i==0)
	    $echo .= '<li><a id="oper">'.$relaciones[$i]->getNombre().'</a></li>';
	    else
	    $echo .= '<li><a>'.$relaciones[$i]->getNombre().'</a></li>';
	    
	echo $echo;
	
	exit;
?>

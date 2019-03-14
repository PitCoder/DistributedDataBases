<?php ini_set('display_errors','on');

// RESCATANDO ALL VALUES

	foreach($_POST as $nombre_campo => $valor){ 
		$asignacion = "\$".$nombre_campo."='".trim($valor)."';"; 
		eval($asignacion);
	}
	
	include('classes/Base.php');
	
//STARTS PROGRAM

	session_start();
	
	$relacion = $_SESSION['base']->getRelacion($data);
	$relacion->setAtributos();
	$atributo = $relacion->getAtributos();
	
	$echo = "";
	for($i=0;$i<count($atributo);$i++)
		{
			$echo .= '<div class="chip">'.$atributo[$i]->getNombre().'</div>';
		}
	 $_SESSION['relacion'] = $relacion;
    echo $echo;
    
	exit;
?>

<?php ini_set('display_errors','on');

// RESCATANDO ALL VALUES

	foreach($_POST as $nombre_campo => $valor){ 
		$asignacion = "\$".$nombre_campo."='".trim($valor)."';"; 
		eval($asignacion);
	}
	include('classes.php');
	
	session_start();
	$evento = unserialize($_SESSION['Evento']);
	
	
//STARTS PROGRAM
	$evento->setUtileriaDB();
	$evento->setUtileria();
	$cuantos = $evento -> cuantosMuebles();
	$info = "";
	for($i=0; $i<count($cuantos);$i=$i+3)
		{
			$info.="<div class='card row col l12'><div class='col l4'>".$cuantos[$i]."</div><div class='col l4' align='center'>".$cuantos[$i+1]."</div>
			<div class='col l4' align='center'>".$cuantos[$i+2]."</div></div>";
		}
	$_SESSION['Evento'] = serialize($evento);
	echo $info;
	exit;
?>
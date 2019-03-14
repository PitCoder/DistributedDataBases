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
	$nextid = $administrador->getControla()->saberSiguienteIDPS();
	$administrador->agregarPredicadoSimple($nextid,$rel,$atributo,$operador,$valor);
	$predicados=$administrador->saberPredicadosSimples();
	$echo = "";
	for($i=0;$i<count($predicados);$i++)
		{
			$echo .= '<div class="row col l12 r4 card">	<p data-pred="'.$predicados[$i]->getID().'">'.$predicados[$i]->getID().'.-'.$predicados[$i]->getSQL().'               Relacion:'.$rel.'</p></div>';
		}
	$_SESSION['admin'] = $administrador;
	echo $echo;
	exit;
?>

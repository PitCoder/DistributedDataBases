<?php ini_set('display_errors','on');

// RESCATANDO ALL VALUES
/*
	foreach($_POST as $nombre_campo => $valor){ 
		$asignacion = "\$".$nombre_campo."='".trim($valor)."';"; 
		eval($asignacion);
	}*/
	
	include('classes.php');
	
//STARTS PROGRAM
	
		/*
		$evento = new Evento('TERT');
		
		if($evento->setValues()){
		    $evento->setUtileriaDB();
		    
		    echo '<div class="card">
			<div class="card-content">
				<span class="card-title">'.$evento->getNombre().'
				<h6 class="right">'.$evento->getFecha().'</h6>
				</span>
				<!-- <p id="pedido">.evento->getDescrip().</p> -->
			</div>
			</div>';
		}*/
		
		//echo $evento->getUtileria()[0]->getModelo();
		
	session_start();
	
	$_SESSION['user']->setEventos();
	
	$echo = "";
	for($x=0; $x < count($_SESSION['user']->getEventos()); $x++){
	    $evento = $_SESSION['user']->getEvento($x);
	    
	    $fecha = getDate()['year']."-".getDate()['mon']."-".getDate()['mday'];
	    if($fecha>$evento->getFecha())
    	    $data = 'pasadas';
    	else if($fecha<=$evento->getFecha())
	        $data = 'futuras';
	    
	    $echo .= '<div class="card '.$data.'">
			<div class="card-content">
				<span class="card-title s4">'.$evento->getID().': '.$evento->getNombre().'
				    <a class="btn right s3" target="_blank" 
				        href="detalle.php?obra='.$evento->getID().'">mas
				    </a>
				    <h6 class="right s3 s4">Hora: '.$evento->getHora().'</h6>
			        <h6 class="right s3 s4">Fecha: '.$evento->getFecha().'</h6>
				</span>
			</div>
		</div>';
	}
	
	echo $echo;
	
	exit;
?>

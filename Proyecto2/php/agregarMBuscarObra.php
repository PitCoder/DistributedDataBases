<?php ini_set('display_errors','on');

// RESCATANDO ALL VALUES

	foreach($_POST as $nombre_campo => $valor){ 
		$asignacion = "\$".$nombre_campo."='".trim($valor)."';"; 
		eval($asignacion);
	}
	
	include('classes.php');
	
//STARTS PROGRAM
	
	$obra = new Evento($id_obra);
	//$obra = new Evento("TERT");
	/*
	$obra-> agregarMueble("H-0001");
	$obra-> agregarMueble("H-0001");
	$obra-> agregarMueble("H-0002");
	$obra-> agregarMueble("H-0003");
	$cuantos = $obra->getUtilieria();
	for($i=0; $i<count($cuantos);$i++)
	    {
	        echo $cuantos[$i]->getModelo()."   ";
	    }
	echo "<br>";
	$obra-> quitarMueble("H-0002");
	$cuantos = $obra->getUtilieria();
	for($i=0; $i<count($cuantos);$i++)
	    {
	        echo $cuantos[$i]->getModelo()."   ";
	    }
	echo "<br>";
	$obra-> quitarMueble("H-0001");
	$cuantos = $obra->getUtilieria();
	for($i=0; $i<count($cuantos);$i++)
	    {
	        echo $cuantos[$i]->getModelo()."   ";
	    }
	echo "<br>";
	$obra-> quitarMueble("H-0001");
	$cuantos = $obra->getUtilieria();;
	for($i=0; $i<count($cuantos);$i++)
	    {
	        echo $cuantos[$i]->getModelo()."   ";
	    }
	echo "<br>";
	
	*/
	if($obra->esValida())
	    {
            session_start();
		    $_SESSION['Evento'] = serialize($obra);
		    echo 1;
	    }
	else
		echo 0;
	exit;
?>
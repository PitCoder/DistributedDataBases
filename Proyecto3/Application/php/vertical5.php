<?php ini_set('display_errors','on');

// RESCATANDO ALL VALUES

	/*foreach($_POST as $nombre_campo => $valor){ 
		$asignacion = "\$".$nombre_campo."='".trim($valor)."';"; 
		eval($asignacion);
	}*/
	
	//include('classes/Relacion.php');
	include('classes/Vertical.php');
	include('classes/Administrador.php');
	//include('classes/Usuario.php');
	
//STARTS PROGRAM

	session_start();
    
    if(!isset($_POST['id'])){
        echo -1; exit;
    }
    
    if(!$_SESSION['admin']->quitFragmento($_POST['id'])){ // GOOD TO BE BOOLEAN 
        //echo '<a href="#" class="collection-item"><b>YA EXISTE</b></a>';
        echo 0;
        exit;
    }
	
	// RESPONSE TO USER INTERFACE
	
	$fragmentos = $_SESSION['admin']->getFragmentos();
	$resp = "";
	
	for($x=0;$x<count($fragmentos);$x++){
	    
    	//$echo = "F".$_SESSION['counter'].": <b>&pi;</b> ";
    	$echo = "F".$fragmentos[$x]->getId().": <b>&pi;</b> ";
    	
    	$attributos = $fragmentos[$x]->getAtributos();
    	
    	for($i=0;$i<count($attributos);$i++){
    	    if($i!=0)
    	        $echo .= ", ";
    	    $echo .= $attributos[$i]->getNombre();
    	}
    	
    	$echo .= " (<b>".$fragmentos[$x]->getOrigen()."</b>)";
    	
    	$resp .= '<a id="'.$fragmentos[$x]->getId().'" href="#" class="collection-item">'.$echo.'
    	        <i id="'.$fragmentos[$x]->getId().'" class="close material-icons">close</i></a>';
    	        
	}
	echo $resp;
	exit;

?>

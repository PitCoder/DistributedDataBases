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
    
    if(!isset($_POST['atributes'])){
        echo -1; exit;
    }
    
	$Relacion = new Relacion($_POST['relacion']);
	$Relacion->setAtributos();
	
	$vertical = new Vertical($_SESSION['counter'],$Relacion->getNombre(),$Relacion->getPK());
	
	//echo $Relacion->getNombre();
	
	
    foreach($_POST['atributes'] as $attr ){
        $vertical->addAtributo($Relacion->getAtributo($attr));
    }
    
    if(!$_SESSION['admin']->addFragmento($vertical)){ // GOOD TO BE BOOLEAN 
        //echo '<a href="#" class="collection-item"><b>YA EXISTE</b></a>';
        echo 0;
        exit;
    }
	
	// RESPONSE TO USER INTERFACE
	
	$echo = "F".$_SESSION['counter'].": <b>&pi;</b> ";
	
	$attributos = $vertical->getAtributos();
	
	for($i=0;$i<count($attributos);$i++){
	    if($i!=0)
	        $echo .= ", ";
	    $echo .= $attributos[$i]->getNombre();
	}
	
	$echo .= " (<b>".$Relacion->getNombre()."</b>)";
	
	echo '<a id="'.$_SESSION['counter'].'" href="#" class="collection-item">'.$echo.'</a>';
	
	$_SESSION['counter']++;
	exit;

?>

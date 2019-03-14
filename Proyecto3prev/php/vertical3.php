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
    
    $id = $_POST['id'];
    $sitio = $_POST['sitio'];
    

    $vertical = $_SESSION['admin']->getFragmento($id);
    
    //echo $vertical->getOrigen();
    echo $vertical->getSQL()."\n";
    echo $vertical->getCreate()."\n";
    echo $vertical->getInsert();
    
	exit;

?>

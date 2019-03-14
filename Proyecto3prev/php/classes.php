<?php ini_set('display_errors','on');

    include('classes/Administrador.php');
    
    session_start();
    
    echo count($_SESSION['admin']->getFragmentos());
    $_SESSION['admin']->resetCrea();
    echo count($_SESSION['admin']->getFragmentos());
   
	
?>

<?php ini_set('display_errors','on');

// RESCATANDO ALL VALUES

	foreach($_POST as $nombre_campo => $valor){ 
		$asignacion = "\$".$nombre_campo."='".trim($valor)."';"; 
		eval($asignacion);
	}
	
	include('classes/Base.php');
	include('classes/Administrador.php');
	
//STARTS PROGRAM

	session_start();
	$relacion = $_SESSION['base']->getRelacion($_POST['atributes']);
	
	if($_POST['sitio']!=0)
        $relacion->setAtributosF();	    
	else
	    $relacion->setAtributos();	    
    
    $atributos = $relacion->getAtributos();
    $data = $relacion->getData($_POST['sitio']);
    
    //HEAD OF THE TABLE
    $head = "<thead><tr>";
    for($i=0;$i<count($atributos);$i++){
        $head .= "<th>".$atributos[$i]->getNombre()."</th>";
    }
    $head .= "</tr></thead>";
    
    //TABLE CONTENT
    $body = "<tbody>";
    for($i=0;$i<count($data);$i++){ //EACH ROW
        $body .= "<tr>";
        for($j=0;$j<count($atributos);$j++) // EACH COL
            $body .= "<td>".$data[$i][$j]."</td>";
        $body .= "</tr>";
    }
    $body .= "</tbody>";
    
    echo '<table class="responsive-table centered striped">'.$head.$body.'</table>';
	exit;

?>

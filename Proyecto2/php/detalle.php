<?php ini_set('display_errors','on');

	include('classes.php');
	
//STARTS PROGRAM

        $obra = new Evento($_POST['obra']);
        $obra->setvalues();
        $obra->setUtileriaDB();
        $obra->setUtileria();
        
        $echo ="";
        $echo .= '<div class="card">
			<div class="card-content">
				<span class="card-title s4">'.$obra->getID().': '.$obra->getNombre().'
				    <!-- a class="btn right s3" target="_blank" 
				        href="detalle.php?obra='.$obra->getID().'">mas
				    </a -->
				    <h6 class="right s3 s4">Hora: '.$obra->getHora().'</h6>
			        <h6 class="right s3 s4">Fecha: '.$obra->getFecha().'</h6>
			        <br><br>
			        <h6 class="left s3 s4">Muebles:</h6>
				</span>
			</div>
		</div>';
        
      
        $array = $obra->cuantosMuebles();
        for($x=0; $x<count($array); $x+=3){
            $mueble = $obra->getMueble($array[$x]);
            $echo .= $mueble->getModelo()."       ";
            $echo .= $mueble->getDescrip()."      <br>";
            //$echo .= $obra->cuantosMuebles()."<br><br>";
        }
        echo $echo;
?>
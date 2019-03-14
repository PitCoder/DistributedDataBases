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
	if($tipo=="agregar")
		{
			$evento->agregarMueble($modelo);
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
		}
	elseif($tipo=="quitar")
		{
			$cuantos = $evento -> cuantosMueblesDelModelo($modelo);
			if($cuantos*1 -1 < 0)
				{
					echo 1;
				}
			else
				{
					$evento->quitarMueble($modelo);
					$evento->setUtileria();
					$cuantos = $evento -> cuantosMuebles();
					$info = "";
					if(count($cuantos)>0)
						{
							for($i=0; $i<count($cuantos);$i=$i+3)
								{
									$info.="<div class='card row col l12'><div class='col l4'>".$cuantos[$i]."</div><div class='col l4' align='center'>".$cuantos[$i+1]."</div>
									<div class='col l4' align='center'>".$cuantos[$i+2]."</div></div>";
								}
						}
					else
						{
							$info = 3;
						}
					$_SESSION['Evento'] = serialize($evento);
					echo $info;
				}
		}
	else
		{
			echo $info;
		}
	

	exit;
?>
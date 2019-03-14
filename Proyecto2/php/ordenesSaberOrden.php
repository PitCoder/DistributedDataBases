<?php ini_set('display_errors','on');

	include('TAktuarDB.php');
	include('classes.php');
	
//STARTS PROGRAM
	
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");
	
	$sql = "SELECT distinct(id_obra), fecha_llegada, fecha_entrega FROM Pedido where oper2 is NULL";
	$res = mysqli_query($conn, $sql);
	$eventos= array();
	while($row3 = mysqli_fetch_assoc($res)) {
		$eventos[] = $row3;
	}
	if(count($eventos)>0)
		{
			$echo = "<div class='row col l12 r4'>";
			for($j=0; $j<count($eventos);$j++)
				{
					$sql = "select *from obras where id_obra ='".$eventos[$j]['id_obra']."'";
					$res = mysqli_query($conn, $sql);
					$auxiliar=array();
					while($row = mysqli_fetch_assoc($res)) {
						$auxiliar[]=$row;
					}
					$nombreObra = $auxiliar[0]['nom_obra'];
					
					$obra = new Evento($auxiliar[0]['id_obra']);			
					$obra->setValues();
					$obra->setUtileriaDB();
					$obra->setUtileria();
								
					 $echo.= '<div class="card row col l12">
						<div class="card-content row col l12">
							<span class="card-title s4">'.$obra->getID().': '.$obra->getNombre().'
								<h6 class="right s3 s4">Hora: '.$obra->getHora().'</h6>
								<h6 class="right s3 s4">Fecha: '.$obra->getFecha().'</h6>
							</span>
							<div class="row col l6">
							<p><b>Muebles de la obra:</b></p><br>';
					
					$array = $obra->cuantosMuebles();
					//Preguntar si cada mueble cumple con las existencias
					 for($x=0; $x<count($array); $x+=3)
						{
							$echo .= "<p> <b>Modelo:</b> ".$array[$x]." , <b>Nombre:</b> ".$array[$x+1]." , <b>Requerido:</b> ".$array[$x+2]."</b> </p>";
						}
					$echo .=' </div><div class="row col l6">';
					
					
					if($eventos[$j]['fecha_llegada']=="")
						{
							$echo .= '<div class="row col l12 s4 center-align input-field">
										<button data-confirmar="'.$obra->getID().'" type="submit" class="btn green col l12 s6">Confirmar llegada de Orden</button>
									</div>';
							$echo .= '<div class="row col l12 s4 center-align input-field">
										<button data-cancelar="'.$obra->getID().'" type="submit" class="btn red col l12 s6">Cancelar Orden</button>
									</div>';
						}
					else if($eventos[$j]['fecha_entrega']=="")
						{
							$echo .= '<div class="row col l12 s4 center-align input-field">
										<button data-devolver="'.$obra->getID().'" type="submit" class="btn blue col l12 s6">Devolver Orden</button>
									</div>';
						}
					$echo.="</div></div></div>";
					
				}
			$echo .= "</div>";
		}
	else
		{
			$echo = "<div  class='row col l12' align-center ><h1> <b> No se encontraron ordenes</b></h1></div>";
		}
	echo $echo;
	
	
	
?>
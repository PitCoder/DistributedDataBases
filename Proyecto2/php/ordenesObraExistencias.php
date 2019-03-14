<?php ini_set('display_errors','on');


	include('classes.php');
	include('MQuetzalDB.php');
	
//STARTS PROGRAM

	$obra = new Evento($_POST['id_obra']);
	$obra->setvalues();
	$obra->setUtileriaDB();
	$obra->setUtileria();
	
	$hoy = getdate();
	$dia = substr($obra->getFecha(), 8, 2);
	$mes = substr($obra->getFecha(), 5, 2);
	$anio = substr($obra->getFecha(), 0, 4);
	$valido =0;
	if( $anio*1 > $hoy['year']*1)
		{
			$valido = 1;
		}
	else if( $anio*1 == $hoy['year']*1)
		{
			if( $mes*1 > $hoy['mon']*1)
				{
				    $valido=1;
				}
			else if( $mes*1 == $hoy['mon']*1)
			    {   
					if( $dia*1 - 3 >= $hoy['mday']*1)
						{
							$valido = 1;
						}
					else
						{
							echo 0;
						}
				}
			else
				{
					echo 1;
				}
		}
	else
		{
			echo 2;
		}
	if($valido == 1)
		{
			$conn = mysqli_connect($servername, $username, $password, $database);
			if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
			mysqli_query($conn, "SET NAMES 'utf8'");
			
			 $echo = '<div class="card row col l12">
				<div class="card-content row col l12">
					<span class="card-title s4">'.$obra->getID().': '.$obra->getNombre().'
						<h6 class="right s3 s4">Hora: '.$obra->getHora().'</h6>
						<h6 class="right s3 s4">Fecha: '.$obra->getFecha().'</h6>
					</span>
					<p><b>Muebles de la obra:</b></p><br>';
			
			$quienesNoCumplen  = array();
			$array = $obra->cuantosMuebles();
			//Preguntar si cada mueble cumple con las existencias
			$problema = 0;
			 for($x=0; $x<count($array); $x+=3)
				{
					$sqlExistencias = "SELECT A.idmodelo, (COALESCE(entradas,0) - COALESCE(salidas,0)) AS existencias
						FROM
							( SELECT idmodelo, SUM(Rotacion.cantidad) as entradas
							FROM Rotacion, Lote
							WHERE idlote=lote
							AND entrada=1
							AND idModelo='".$array[$x]."') AS A
									
							LEFT JOIN 
										
							(SELECT idmodelo, SUM(Rotacion.cantidad) as salidas
							FROM Rotacion, Lote
							WHERE idlote=lote
							AND entrada=0
							AND idModelo='".$array[$x]."') AS B
				   
							ON A.idmodelo=B.idmodelo;";

					$resExistencias  = mysqli_query($conn, $sqlExistencias);
					$Model = $resExistencias->fetch_assoc();
					if($Model['existencias']*1 - $array[$x+2]*1 >= 0)
						{
							$echo .= "<p> <b>Modelo:</b> ".$array[$x]." , <b>Nombre:</b> ".$array[$x+1]." , <b>Requerido:</b> ".$array[$x+2]."  y <b class='green-text'> Disponible: ".$Model['existencias']." </b> </p>";
						}
					else
						{
							$problema = 1;
							$echo .= "<p> <b>Modelo:</b> ".$array[$x]." , <b>Nombre:</b> ".$array[$x+1]." , <b>Requerido:</b> ".$array[$x+2]."  y <b class='red-text'> Disponible: ".$Model['existencias']." </b> </p>";
						}
				}
			$echo .=' 
				</div>
			</div>';
			if($problema == 1)
				{
					$echo .='<div class="card row col l12">
						<span class="card-title s4" id="Estado" data-valido="No"> <h5 class="red-text" >Debido a que las existencias no cumplen, no se podr&aacute; realizar la orden</h5>
					</span></div>';
				}
			else
				{
					$echo .='<h5 class="red-text"  id="Estado" data-valido="Si"></h5>';
				}
			echo $echo;
		}
	
	
?>
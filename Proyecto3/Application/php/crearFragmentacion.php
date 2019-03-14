<?php ini_set('display_errors','on');

// RESCATANDO ALL VALUES

	include('classes/Administrador.php');
	
//STARTS PROGRAM

	session_start();
	
	$administrador = $_SESSION['admin'];
	$resp=$administrador->crearFragmentosHorizontales();
	if($resp==1)
		{
			$crea = $administrador->getFragmentos();
			
			$echo = '<table>
						<thead>
							<tr>
								<th class="center">Identificador</th>
								<th class="center">Relaci&oacute;n</th>
								<th class="center">Predicado Minit&eacute;rmino</th>
								<th class="center">Minimalidad</th>
								<th class="center">Colocar en el sitio</th>
							</tr>
						</thead>
						<tbody>';			
			
			for($i=0;$i<count($crea);$i++)
				{
					$echo .= '<td class="center">'.$crea[$i]->getId().' </p> </td>';
					$echo .= '<td class="center">'.$crea[$i]->getTiene()->getOrigenPredicadoA().'</p></td>';
					$echo .= '<td class="center">'.$crea[$i]->getTiene()->getSQL().'</p></td>';
					if($crea[$i]->getTiene()->comprobarMinimalidad())
						{
							$echo .= '<td class="center"> Cumple </p></td>';
							$echo .= "<td class='center'>";
							$echo .= '<a class="waves-effect waves-light btn orange" data-sitio="1" data-frag="'.$crea[$i]->getId().'">s1</a>';
							$echo .= '<a class="waves-effect waves-light btn orange" data-sitio="2"  data-frag="'.$crea[$i]->getId().'">s2</a>';
							$echo .= '<a class="waves-effect waves-light btn orange" data-sitio="3" data-frag="'.$crea[$i]->getId().'">s3</a>';
							$echo .= '</td>';
						}
					else
						{
							$echo .= '<td class="center"> No cumple </p></td>';
						}
					$echo .= "</tr>";
					
				}
			$_SESSION['admin'] = $administrador;
			$echo .= "</tbody></table>";
			echo $echo;
			//echo "Dice que se puede crear la fragmentacion con los predicados dados";
		}
	else
		{
			echo $resp;
		}
	exit;
?>

<?php ini_set('display_errors','on');

// RESCATANDO ALL VALUES

	include('classes/Administrador.php');
	
//STARTS PROGRAM

	session_start();
	
	$administrador = $_SESSION['admin'];
	$predicados=$administrador->saberPredicadosSimples();
	/*$echo = '<div class="row col l12 r4 card">';
	for($i=0;$i<count($predicados);$i++)
		{
			$echo .= '<div class="row col l12 r4 card">';
			$echo .= '<div class="row col l1 r4 center"> <p>'.$predicados[$i]->getID().' </p> </div>';
			$echo .= '<div class="row col l4 r4 center"> <p>'.$rel.' </p> </div>';
			$echo .= '<div class="row col l4 r4 center"> <p>'.$predicados[$i]->getSQL().'</p></div>';
			$echo .= '<div class="row col l3 r4 center"> <a class="waves-effect waves-light btn right orange" data-relp= "'.$rel.'" data-pred="'.$predicados[$i]->getID().'">Quitar</a></div>';
			$echo .= "</div>";
		}
	$_SESSION['admin'] = $administrador;
	$echo .= "</div>";*/
	
	$echo = '<table>
				<thead>
					<tr>
						<th class="center">Relaci&oacute;n</th>
						<th class="center">Condici&oacute;n</th>
						<th class="center"></th>
					</tr>
				</thead>
				<tbody>';
	for($i=0;$i<count($predicados);$i++)
		{
			$echo .= '<td class="center">'.$predicados[$i]->getOrigen().' </p> </td>';
			$echo .= '<td class="center">'.$predicados[$i]->getSQL().'</p></td>';
			$echo .= '<td class="center"><a class="waves-effect waves-light btn orange" data-relp= "'.$predicados[$i]->getOrigen().'" data-pred="'.$predicados[$i]->getID().'">Quitar</a></td>';
			$echo .= "</tr>";
		}
	$_SESSION['admin'] = $administrador;
	$echo .= "</tbody></table>";
	
	
	echo $echo;
	exit;
?>

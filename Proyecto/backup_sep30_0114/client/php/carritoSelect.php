<?php ini_set('display_errors','on');

$servername = "localhost";
$username = "id2689058_sgviddb";
$password = "distributedDB";
$database = "id2689058_sgviddb";

// CREATE AND CHECK CONNECTION
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");

//STARTS PROGRAM
session_start();

	$muebles = $_SESSION["carritoDan"];

	$sql = "SELECT modelo, nombre, foto, precio, descuento FROM Modelo";
	$resultado = mysqli_query($conn, $sql);
      
	$encode = array();
	while($row = mysqli_fetch_assoc($resultado)) {
		$encode[] = $row;
	}

	$resp = "";
	for($y = 0; $y < count($muebles); $y++){
		for ($x = 0; $x < count($encode); $x++) {
		
			if($encode[$x]['modelo']==$muebles[$y]['mod']){
				$cantidad = 1;
				$descuento = $encode[$x]['precio']-($encode[$x]['descuento']*$encode[$x]['precio']);
				$total1 = $descuento*$cantidad;
				$descuento = number_format($descuento,2,'.',',');

				$total1 = number_format($total1,2,'.',',');

				$aux ="<?php  unset(\$_SESSION[\'mueblesTest\'][array_search(\'".$encode[$x]['modelo']."\')]); ?>";
				
				$sqlExistencias = "SELECT A.idmodelo, (entradas - COALESCE(salidas,0)) AS existencias
				FROM
					( SELECT idmodelo, SUM(Rotacion.cantidad) as entradas
					FROM Rotacion, Lote
					WHERE idlote=lote
					AND entrada=1
					AND idModelo='".$encode[$x]['modelo']."') AS A
				
			    		LEFT JOIN 
			    				
					(SELECT idmodelo, SUM(Rotacion.cantidad) as salidas
					FROM Rotacion, Lote
					WHERE idlote=lote
					AND entrada=0
					AND idModelo='".$encode[$x]['modelo']."') AS B
	   
					ON A.idmodelo=B.idmodelo;";

				$resExistencias  = mysqli_query($conn, $sqlExistencias);
				$Model = $resExistencias->fetch_assoc();
				$exs = $Model['existencias'];
				
				if($exs>=14){
					$exs = 14; }

				if($encode[$x]['descuento']>0){
					$money = "<span class='price'>$ ".$encode[$x]['precio']." MXN</span><br>
					<span class='discount green-text' id='dis-".$encode[$x]['modelo']."'>$ ".$descuento." MXN</span>";
				}
				else{
					$money = "<span class='green-text' id='ndis-".$encode[$x]['modelo']."'>$ ".$encode[$x]['precio']." MXN</span><br>";
				}
				
				$resp .="<tr id='".$encode[$x]['modelo']."'>
					<td><img width='100px' src='img/".$encode[$x]['foto']."'></td>
					<td>".$encode[$x]['nombre']."</td>
					<td>".$encode[$x]['modelo']."</td>
					<td>".$money."</td>
					<td><input id='cant-".$encode[$x]['modelo']."' class='number-field' min='1' max='".$exs."' type='number' value='".$muebles[$y]['num']."' ></td>
					<td class='subTot' id='t".$encode[$x]['modelo']."'>$ ".$total1." MXN</td>
					<td><button class='btn-flat elim' id='del-".$encode[$x]['modelo']."' ><span class='glyphicon glyphicon-remove'></span></button>
					</td>
					</tr>
					<div id='auxiliar'>
					</div>";
			}
		} 
	}
  echo $resp;
exit;
?>
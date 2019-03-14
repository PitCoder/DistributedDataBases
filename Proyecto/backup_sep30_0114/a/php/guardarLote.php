<?php ini_set('display_errors','on');

$servername = "localhost";
$username = "id2689058_sgviddb";
$password = "distributedDB";
$database = "id2689058_sgviddb";

// RESCATANDO ALL VALUES
	
	$modelo = $_POST['modelo'];
	$almacenes = $_POST['almacenes'];
	$cantidad = $_POST['cantidad'];
	$fecha = getDate()['year']."-".getDate()['mon']."-".getDate()['mday'];
	
// CREATE AND CHECK CONNECTION

	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");

//STARTS PROGRAM

	//Saber el id para el siguiente Lote
	
	$sql = "SELECT  MAX(lote) AS lote FROM Lote";
	$resultado = mysqli_query($conn, $sql);
	$auxiliar=array();
	while($row = mysqli_fetch_assoc($resultado)) {
		$auxiliar[]=$row;
	}
	$id = $auxiliar[0]['lote'];
	$id= ($id*1)+1;
	
	//Insertas el Lote
	$sql2 = "INSERT INTO Lote values ($id,'$modelo','$fecha',$cantidad)";
	$resultado2 = mysqli_query($conn, $sql2);
	
	//Saber el id para la siguiente Rotacion
	$sql = "SELECT  MAX(operacion) AS operacion FROM Rotacion";
	$resultado = mysqli_query($conn, $sql);
	$auxiliar=array();
	while($row = mysqli_fetch_assoc($resultado)) {
		$auxiliar[]=$row;
	}
	$idR = $auxiliar[0]['operacion'];
	$idR= ($idR*1)+1;
	
	//Se insertaran los almacenes, pero tenemos que saber que id tienen
	for($i=0;$i<count($almacenes);$i++)
		{
			$sql3 = "Select id from Almacen where nombre = '".$almacenes[$i]['nombre']."'";
			$resultado3 = mysqli_query($conn, $sql3);
			$auxiliar3=array();
			while($row3 = mysqli_fetch_assoc($resultado3)) {
				$auxiliar3[]=$row3;
			}
			$idA = $auxiliar3[0]['id'];
			$sql4 = "INSERT INTO Rotacion VALUES(".($idR*1+$i*1).",$id,$idA,".$almacenes[$i]['agregar'].",'$fecha','Llegada de nuevos muebles al almacen',1);";
			$resultado4 = mysqli_query($conn, $sql4);
		}

	echo mysqli_affected_rows($conn);
exit; ?>
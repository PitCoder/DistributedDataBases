<?php ini_set('display_errors','on');

	include('MQuetzalDB.php');
	
//STARTS PROGRAM
	$fecha = getDate()['year']."-".getDate()['mon']."-".getDate()['mday'];
	$operaciones = $_POST['operaciones'];
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");
	
	$sql = "SELECT  MAX(operacion) AS operacion FROM Rotacion";
	$resultado = mysqli_query($conn, $sql);
	$auxiliar=array();
	while($row = mysqli_fetch_assoc($resultado)) {
		$auxiliar[]=$row;
	}
	$idR = $auxiliar[0]['operacion'];
	$idR= ($idR*1)+1;
	
	$respuesta = array();
	for($j=0; $j<count($operaciones);$j++)
		{
			$sqlLote = 'Select idLote, cantidad, idAlmacen from Rotacion where operacion = '.$operaciones[$j];
			$res = mysqli_query($conn, $sqlLote);
			$auxiliar=array();
			while($row = mysqli_fetch_assoc($res)) {
				$auxiliar[]=$row;
			}
			$idL = $auxiliar[0]['idLote'];
			$idA = $auxiliar[0]['idAlmacen'];
			$cantidad = $auxiliar[0]['cantidad'];
			
			$sql = 'INSERT INTO Rotacion VALUES('.$idR.','.$idL.','.$idA.','.$cantidad.',"'.$fecha.'", "Devolucion de los muebles prestados a Aktuar",1)';
			$res = mysqli_query($conn, $sql);
			array_push($respuesta,$idR*1);
			$idR++;
		}
		
	echo json_encode($respuesta);
	
	
?>
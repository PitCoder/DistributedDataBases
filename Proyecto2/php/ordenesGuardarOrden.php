<?php ini_set('display_errors','on');


	include('classes.php');
	include('TAktuarDB.php');
	
//STARTS PROGRAM
	$aGuardar = $_POST['guardar'];
	$idobra = $_POST['idObra'];
	$obra = new Evento($idobra);
	$obra->setvalues();
	$obra->setUtileriaDB();
	$obra->setUtileria();
	
	
	$fecha = getDate()['year']."-".getDate()['mon']."-".getDate()['mday'];
	
	
	$mes = substr($obra->getFecha(), 5, 2);
	$anio = substr($obra->getFecha(), 0, 4);
	
	if($mes*1 +1 >12)
		{
			$anio = $anio*1 + 1;
		}
	else
		{
			$mes = $mes*1 + 1;
		}
	$fecha_lim = $anio."-".$mes."-".substr($obra->getFecha(), 8, 2);
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");
			
	for($i=0; $i<count($aGuardar);$i++)
		{
			$sql = "insert into Pedido values(".$aGuardar[$i].",NULL,'".$fecha."',NULL,'".$fecha_lim."',NULL,'".$idobra."')";
			$resultado4 = mysqli_query($conn, $sql);
		}
	echo mysqli_affected_rows($conn);
	
	
?>
<?php ini_set('display_errors','on');


	include('classes.php');
	include('MQuetzalDB.php');
	
//STARTS PROGRAM

	$fecha = getDate()['year']."-".getDate()['mon']."-".getDate()['mday'];
	$obra = new Evento($_POST['id_obra']);
	$obra->setvalues();
	$obra->setUtileriaDB();
	$obra->setUtileria();
	
	
	
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");
	$respuesta = array();
	$cuantos = $obra->cuantosMuebles();
	for($i=0;$i<count($cuantos); $i = $i+3)
		{
			$quienes = array();
			$sqlExistenciasEnAlmacen = "SELECT A.idAlmacen, A.almacen, A.idmodelo, A.elLote, (entradas - COALESCE(salidas,0)) AS existencias, A.capacidad
				FROM
					( SELECT Almacen.id AS idAlmacen,Almacen.nombre AS almacen,Almacen.capacidad AS capacidad, lote AS elLote, idmodelo, SUM(Rotacion.cantidad) as entradas
					FROM Rotacion, Lote, Almacen
					WHERE idlote=lote
					AND Almacen.id = Rotacion.idAlmacen
					AND entrada=1
					AND idModelo='".$cuantos[$i]."'
					GROUP BY 1, elLote) AS A
						
						LEFT JOIN 
								
					(SELECT Almacen.id as idAlmacen, idmodelo, Lote.lote AS elLote, SUM(Rotacion.cantidad) as salidas
					FROM Rotacion, Lote, Almacen
					WHERE idlote=lote
					AND Almacen.id = Rotacion.idAlmacen
					AND entrada=0
					AND idModelo='".$cuantos[$i]."'
					GROUP BY 1, lote) AS B
		   
					ON A.idmodelo=B.idmodelo AND A.idAlmacen=B.idAlmacen AND A.elLote=B.elLote
					ORDER BY existencias desc;";
			$existenciasEnAlmacen = mysqli_query($conn, $sqlExistenciasEnAlmacen);
			$almacenes= array();
			while($row3 = mysqli_fetch_assoc($existenciasEnAlmacen)) {
				$almacenes[] = $row3;
			}
			$restante = $cuantos[$i+2];
			for($j=0;$j<count($almacenes);$j++)
				{
					if($restante <= $almacenes[$j]["existencias"])
						{
							array_push($quienes,$almacenes[$j]["idAlmacen"],$almacenes[$j]["elLote"],$restante);
							break;
						}
					else
						{
							array_push($quienes,$almacenes[$j]["idAlmacen"],$almacenes[$j]["elLote"],$almacenes[$j]["existencias"]);
							$restante - $almacenes[$j]["existencias"];
						}
				}
			$sql = "SELECT  MAX(operacion) AS operacion FROM Rotacion";
			$resultado = mysqli_query($conn, $sql);
			$auxiliar=array();
			while($row = mysqli_fetch_assoc($resultado)) {
				$auxiliar[]=$row;
			}
			$idR = $auxiliar[0]['operacion'];
			$idR= ($idR*1)+1;
			
			for($j=0; $j<count($quienes);$j=$j+3)
				{
					$sql4 = "INSERT INTO Rotacion VALUES(".$idR.",".$quienes[$j+1].",".$quienes[$j].",".$quienes[$j+2].",'$fecha','Envio de muebles al teatro Aktuar',0);";
					$resultado4 = mysqli_query($conn, $sql4);
					array_push($respuesta,$idR*1);
					$idR++;
				}
		}
	echo json_encode($respuesta);
	
	
?>
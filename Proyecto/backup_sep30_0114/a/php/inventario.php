<?php ini_set('display_errors','on');

$servername = "localhost";
$username = "id2689058_sgviddb";
$password = "distributedDB";
$database = "id2689058_sgviddb";

// RESCATANDO ALL VALUES

	foreach($_POST as $nombre_campo => $valor){ 
		$asignacion = "\$".$nombre_campo."='".trim($valor)."';"; 
		eval($asignacion); 
    }

// CREATE AND CHECK CONNECTION
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");

//STARTS PROGRAM

	$sql = "SELECT  modelo FROM Modelo where modelo='".$modelo."'";
	$resultado = mysqli_query($conn, $sql);
	$existen=0;
	while($row = mysqli_fetch_assoc($resultado)) {
		$existen++;
	}
	$resp = "";
	if($existen==0)
		{
			$resp=1;
		}
	else if($existen>1)
		{
			$resp=2;
		}
	else
		{
			$sqlExistenciasTotales = "SELECT A.idmodelo, (entradas - COALESCE(salidas,0)) AS existencias
					FROM
						( SELECT idmodelo, SUM(Rotacion.cantidad) as entradas
						FROM Rotacion, Lote
						WHERE idlote=lote
						AND entrada=1
						AND idModelo='".$modelo."') AS A
							
							LEFT JOIN 
									
						(SELECT idmodelo, SUM(Rotacion.cantidad) as salidas
						FROM Rotacion, Lote 
						WHERE idlote=lote
						AND entrada=0
						AND idModelo='".$modelo."') AS B
			   
						ON A.idmodelo=B.idmodelo;";
			$existenciasTotales = mysqli_query($conn, $sqlExistenciasTotales);
			$auxiliar= array();
			$existen=0;
			while($row2 = mysqli_fetch_assoc($existenciasTotales)) {
				$auxiliar[] = $row2;
				$existen++;
			}
			$cantModelo = $auxiliar[0]["existencias"];
			
			$sqlExistenciasEnAlmacen = "SELECT A.idAlmacen, A.almacen, A.idmodelo, A.elLote, (entradas - COALESCE(salidas,0)) AS existencias, A.capacidad
				FROM
					( SELECT Almacen.id AS idAlmacen,Almacen.nombre AS almacen,Almacen.capacidad AS capacidad, lote AS elLote, idmodelo, SUM(Rotacion.cantidad) as entradas
					FROM Rotacion, Lote, Almacen
					WHERE idlote=lote
					AND Almacen.id = Rotacion.idAlmacen
					AND entrada=1
					AND idModelo='".$modelo."'
					GROUP BY 1, elLote) AS A
						
						LEFT JOIN 
								
					(SELECT Almacen.id as idAlmacen, idmodelo, Lote.lote AS elLote, SUM(Rotacion.cantidad) as salidas
					FROM Rotacion, Lote, Almacen
					WHERE idlote=lote
					AND Almacen.id = Rotacion.idAlmacen
					AND entrada=0
					AND idModelo='".$modelo."'
					GROUP BY 1, lote) AS B
		   
					ON A.idmodelo=B.idmodelo AND A.idAlmacen=B.idAlmacen AND A.elLote=B.elLote;";
			$existenciasEnAlmacen = mysqli_query($conn, $sqlExistenciasEnAlmacen);
			$almacenes= array();
			while($row3 = mysqli_fetch_assoc($existenciasEnAlmacen)) {
				$almacenes[] = $row3;
			}
			for($i=0;$i<count($almacenes);$i++)
				{
					$resp.= "<div class='alma-".$almacenes[$i]["idAlmacen"]." card col l12 s4' id='".$i."' data-visible='V'>
								<div class='col l2 s4'>
									<br><p><b>Almac&eacuten:</b><br>".$almacenes[$i]["almacen"]." </p>
								</div>
								<div class='col l2 s4'>
									<br><p><b>Modelo:</b><br> ".$modelo."</p>
								</div>
								<div class='col l2 s4'>
									<br><p><b>Lote:</b><br>  ".$almacenes[$i]["elLote"]." </p>
								</div>
								<div class='col l2 s4'>
									<br><p><b>Existencias del mueble en el almac&eacuten:</b><br> ".$almacenes[$i]["existencias"]." </p>
								</div>
								<div class='col l2 s4'>
									<br><p><b>Todas las existencias:</b><br> ".$cantModelo." </p>
								</div>
								<div class='col l2 s4'>
									<br><p><b>Capacidad del almac&eacuten:</b><br> ".$almacenes[$i]["capacidad"]."</p>
								</div>
							</div>";
				}
		}
echo $resp;
exit; ?>
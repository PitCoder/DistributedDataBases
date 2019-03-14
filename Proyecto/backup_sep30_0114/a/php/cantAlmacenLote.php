<?php ini_set('display_errors','on');

$servername = "localhost";
$username = "id2689058_sgviddb";
$password = "distributedDB";
$database = "id2689058_sgviddb";

// RESCATANDO ALL VALUES
	$almacen=$_POST["almacen"];

// CREATE AND CHECK CONNECTION
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");

//STARTS PROGRAM

	$sql = "SELECT  nombre FROM Almacen where nombre='".$almacen."'";
	$resultado = mysqli_query($conn, $sql);
	$existen=0;
	while($row = mysqli_fetch_assoc($resultado)) {
		$existen++;
	}
	$resp = "";
	if($existen==0)
		{
			$resp="Nel";
		}
	else
		{
			$TotalEntradas=0;
			$TotalSalidas=0;
			$capacidadAlmacen=0;
			$sqlEntradas = "SELECT SUM(Rotacion.cantidad) as entradas
						FROM Rotacion, Almacen
						WHERE id=idAlmacen
						AND entrada=1
						AND nombre='".$almacen."'";
			$resultado = mysqli_query($conn, $sqlEntradas);
			$auxiliar= array();
			$existen=0;
			while($row = mysqli_fetch_assoc($resultado)) {
				$auxiliar[] = $row;
				$existen++;
			}
			if($existen>0)
				{
					$TotalEntradas = $auxiliar[0]["entradas"];
				}
				
			
			$sqlSalidas = "SELECT  idAlmacen, SUM(Rotacion.cantidad) as salidas
						FROM Rotacion, Almacen
						WHERE id=idAlmacen
						AND entrada=0
						AND nombre='".$almacen."'";
			$resultado = mysqli_query($conn, $sqlSalidas);
			$auxiliar= array();
			$existen=0;
			while($row = mysqli_fetch_assoc($resultado)) {
				$auxiliar[] = $row;
				$existen++;
			}
			if($existen>0)
				{
					$TotalSalidas = $auxiliar[0]["salidas"];
				}
				
			$sqlCapacidad = "SELECT capacidad FROM Almacen where nombre = '".$almacen."'";
			$resultado = mysqli_query($conn, $sqlCapacidad);
			$auxiliar= array();
			while($row = mysqli_fetch_assoc($resultado)) {
				$auxiliar[] = $row;
			}
			$capacidadAlmacen=$auxiliar[0]["capacidad"];
			
			
			$resp = $capacidadAlmacen - $TotalEntradas + $TotalSalidas;
		}
echo $resp;
exit; ?>
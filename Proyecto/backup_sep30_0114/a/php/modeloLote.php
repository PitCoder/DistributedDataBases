<?php ini_set('display_errors','on');

$servername = "localhost";
$username = "id2689058_sgviddb";
$password = "distributedDB";
$database = "id2689058_sgviddb";

// RESCATANDO ALL VALUES
	
	$modelo = $_POST["modelo"]; 
    

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
			
			$resp=$modelo;
		}
	else
		{
			$almacenes = array();
			$sql = "SELECT id, nombre FROM Almacen";
			$resultado = mysqli_query($conn, $sql);
			while($row2 = mysqli_fetch_assoc($resultado)) {
				$almacenes[] = $row2;
			}
			$resp="<ul class='collection categoria'>";
			for($i=0; $i<count($almacenes);$i++)
				{
					$resp.="<a  class='opcionAlmacen collection-item' id='".$almacenes[$i]["id"]."' data-almacen='".$almacenes[$i]["nombre"]."'>".$almacenes[$i]["nombre"]."</a>";
				}
			$resp.="</ul>";
		}
echo $resp;
exit; ?>
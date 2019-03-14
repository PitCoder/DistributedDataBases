<?php ini_set('display_errors','on');

$servername = "localhost";
$username = "id2689058_sgviddb";
$password = "distributedDB";
$database = "id2689058_sgviddb";

// RESCATANDO ALL VALUES


// CREATE AND CHECK CONNECTION
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");

//STARTS PROGRAM


	$sql = "SELECT id, nombre FROM Material";
	
	$resultado = mysqli_query($conn, $sql);
		
	$encode = array();
	while($row = mysqli_fetch_assoc($resultado)) {
   		$encode[] = $row;
	}

	$resp = "<h5> Materiales </h5> <ul class='collection'>";

	for ($x = 0; $x < count($encode); $x++) {
		$resp .="<a class='mate collection-item' data-mate='".$encode[$x]['id']."'>".$encode[$x]['nombre']."</a>";
	 } 
	$resp .="</ul>";
	echo $resp;
exit;
?>
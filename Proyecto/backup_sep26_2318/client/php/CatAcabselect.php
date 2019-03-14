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


	$sql = "SELECT * FROM Acabado";
	
	$resultado = mysqli_query($conn, $sql);
		
	$encode = array();
	while($row = mysqli_fetch_assoc($resultado)) {
   		$encode[] = $row;
	}

	$resp = "";

	for ($x = 0; $x < count($encode); $x++) {
		$resp .="<p class='numAcab' data-acab='".$encode[$x]['id']."'>
      			<input type='checkbox' checked='checked' class='filled-in' id='acab-".$encode[$x]['id']."'/>
      			<label for='acab-".$encode[$x]['id']."' >".$encode[$x]['nombre']."</label>
			</p>";
	 } 

	echo $resp;
exit;
?>

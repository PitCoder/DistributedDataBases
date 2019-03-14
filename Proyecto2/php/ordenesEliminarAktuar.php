<?php ini_set('display_errors','on');

	include('TAktuarDB.php');
	include('classes.php');
	
//STARTS PROGRAM
	$obra = $_POST['obra'];
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");
	
	$sql = "SELECT oper1 FROM Pedido where id_obra = '".$obra."'";
	$res = mysqli_query($conn, $sql);
	$operaciones= array();
	while($row3 = mysqli_fetch_assoc($res)) {
		$operaciones[] = $row3;
	}
	$eliminados = array();
	for($j=0; $j<count($operaciones);$j++)
		{
			array_push($eliminados,$operaciones[$j]['oper1']*1);
			$sql = 'DELETE FROM Pedido where oper1='.$operaciones[$j]['oper1'].' and id_obra = "'.$obra.'"';
			$res = mysqli_query($conn, $sql);
		}
		
	echo json_encode($eliminados);
	
	
?>
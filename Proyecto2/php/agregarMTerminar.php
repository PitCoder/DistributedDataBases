<?php ini_set('display_errors','on');

// RESCATANDO ALL VALUES

	foreach($_POST as $nombre_campo => $valor){ 
		$asignacion = "\$".$nombre_campo."='".trim($valor)."';"; 
		eval($asignacion);
	}
	include('classes.php');
	
	session_start();
	$evento = unserialize($_SESSION['Evento']);
	
	
//STARTS PROGRAM

	$eventoaux = new Evento($evento->getID()); //antiguo valor
	$eventoaux->setUtileriaDB();
	
	$cuantos = $evento -> cuantosMuebles();
	$cuantosaux = $eventoaux -> cuantosMuebles();
	
	$faltantes = array();
	$sobrantes = array();
	$actuales = array();
	
	$aux = count($cuantosaux)/3;
	$auxQuien = array();
	$auxExiste = array();
	for($i=0; $i<$aux;$i++)
		{
			array_push($auxQuien,$cuantosaux[$i*3]);
			array_push($auxExiste,0);
		}			
	
	for($i=0; $i<count($cuantos);$i=$i+3)
		{
			$existe =0;
			for($j=0; $j<count($cuantosaux);$j=$j+3)
				{
					if($cuantosaux[$j] == $cuantos[$i])
						{
							$existe = 1;
							array_push($actuales,$cuantos[$j]);
							array_push($actuales,$cuantos[$j+2]);
							$auxExiste[$j/3] = 1;
						}
				}
			if($existe == 0)
				{
					array_push($faltantes,$cuantos[$i]);
					array_push($faltantes,$cuantos[$i+2]);
				}
		}
	for($i=0; $i<count($auxExiste);$i++)
		{
			if($auxExiste[$i]==0)
				{
					array_push($sobrantes,$auxQuien[$i]);
				}
		}
	
	$resp = "";
	/*
	for($i=0; $i<count($actuales);$i=$i+2)
		{
			$resp.="<div class='actuales'> <p>Modelo: ".$actuales[$i].", Cantidad nueva: ".$actuales[$i+1]."</p></div>";
		}
	for($i=0; $i<count($faltantes);$i=$i+2)
		{
			$resp.="<div class='faltantes'> <p>Modelo: ".$faltantes[$i].", Cantidad nueva: ".$faltantes[$i+1]."</p></div>";
		}
	for($i=0; $i<count($sobrantes);$i++)
		{
			$resp.="<div class='sobrantes'> <p>Modelo: ".$sobrantes[$i]."</p></div>";
		}*/
	include('TAktuarDB.php');
	
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");
	
	for($i=0; $i<count($actuales);$i=$i+2)
		{
			$sql = "Update Mueble set Cantidad=".$actuales[$i+1]." where (obras_id_obra='".$evento->getID()."' and Modelo = '".$actuales[$i]."')";
			$resultado = mysqli_query($conn, $sql);			
		}
	for($i=0; $i<count($faltantes);$i=$i+2)
		{
			$sql = 'INSERT INTO Mueble VALUES("'.$faltantes[$i].'",'.$faltantes[$i+1].',"'.$evento->getID().'")';
			$resultado = mysqli_query($conn, $sql);			
		}
	for($i=0; $i<count($sobrantes);$i++)
		{
			$sql="DELETE FROM Mueble WHERE (obras_id_obra='".$evento->getID()."' and Modelo = '".$sobrantes[$i]."')";
			$resultado = mysqli_query($conn, $sql);			
		}
	echo $resp;
exit;
?>
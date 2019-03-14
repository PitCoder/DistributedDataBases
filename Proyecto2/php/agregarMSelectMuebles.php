<?php ini_set('display_errors','on');

	include('MQuetzalDB.php');

// RESCATANDO ALL VALUES


// CREATE AND CHECK CONNECTION
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");

//STARTS PROGRAM


	$sql = "SELECT * FROM Modelo";
	$resultado = mysqli_query($conn, $sql);
		
	$encode = array();
	while($row = mysqli_fetch_assoc($resultado)) {
   		$encode[] = $row;
	}
	
	
	$sql1 = "SELECT * FROM AcabadoModelo";
	$resultado1 = mysqli_query($conn, $sql1);

	$acabados = array();
	while($row1 = mysqli_fetch_assoc($resultado1)){
		$acabados[] = $row1;
	}

	$sql1 = "SELECT * FROM MaterialModelo";
	$resultado1 = mysqli_query($conn, $sql1);

	$materiales = array();
	while($row1 = mysqli_fetch_assoc($resultado1)){
		$materiales[] = $row1;
	}
	
	$sql1 = "SELECT * FROM CategoriaModelo";
	$resultado1 = mysqli_query($conn, $sql1);

	$categorias = array();
	while($row1 = mysqli_fetch_assoc($resultado1)){
		$categorias[] = $row1;
	}

	$resp = "";
	$y = 0;
	
	for ($x = 0; $x < count($encode); $x++)
		{	
			$acabado = "";
			for ($y = 0; $y < count($acabados); $y++)
				{
					if($acabados[$y]['idModelo']==$encode[$x]['modelo'])
						{
							$acabado .=" acab-".$acabados[$y]['idAcabado'];
						}
				}
				
			$material = "";
			for ($y = 0; $y < count($materiales); $y++)
				{
					if($materiales[$y]['idModelo']==$encode[$x]['modelo'])
						{
							$material .=" mate-".$materiales[$y]['idMaterial'];
						}
				}
			$categoria = "";
			for ($y = 0; $y < count($categorias); $y++)
				{
					if($categorias[$y]['idModelo']==$encode[$x]['modelo'])
						{
							$categoria .=" cate-".$categorias[$y]['idCat'];
						}
				}
			
			$resp .= "<div class='Mueble card col l3 s4".$categoria.$acabado.$material."' data-visible='V' id='".$y."'>
				<br>
				<div class='card-image'>
				<img class='responsive-img' width='100px' src='img/".$encode[$x]['foto']."'>
				</div>
				<div class='card-content row col l12'>
				<p><b>".$encode[$x]['nombre']."</b><br>
				<p><b>Altura:</b> ".$encode[$x]['dimenAlto']." mts.</p><br>
				<p><b>Anchura:</b> ".$encode[$x]['dimenAncho']." mts.</p><br>
				<p><b>Profundidad:</b> ".$encode[$x]['dimenProfun']." mts.</p><br>
				<span class='s1'><br><br>
					<div class='row col l12' align='center'><a class='col l12 waves-effect waves-light btn cat'  data-nombre='".$encode[$x]['nombre']."' data-modelo='".$encode[$x]['modelo']."'>Agregar</a></div>
					<div class='row col l12' align='center'><a class='col l12 waves-effect waves-light btn red cat'  data-nombre='".$encode[$x]['nombre']."' data-elim-modelo='".$encode[$x]['modelo']."'>Quitar</a></div>
				</div>
				</div>";		
		} 
	echo $resp;
exit;
?>
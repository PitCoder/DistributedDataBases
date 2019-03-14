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


	$resp = "";
	$y = 0;
	
	for ($x = 0; $x < count($encode); $x++){
	
		$sqlExistencias = "SELECT A.idmodelo, (entradas - COALESCE(salidas,0)) AS existencias
		FROM
			( SELECT idmodelo, SUM(Rotacion.cantidad) as entradas
			FROM Rotacion, Lote
			WHERE idlote=lote
			AND entrada=1
			AND idModelo='".$encode[$x]['modelo']."') AS A
					
			LEFT JOIN 
	    				
			(SELECT idmodelo, SUM(Rotacion.cantidad) as salidas
			FROM Rotacion, Lote
			WHERE idlote=lote
			AND entrada=0
			AND idModelo='".$encode[$x]['modelo']."') AS B
   
			ON A.idmodelo=B.idmodelo;";

		$resExistencias  = mysqli_query($conn, $sqlExistencias);
		$Model = $resExistencias->fetch_assoc();
		
		if($Model['existencias']>0){
		
			$acabado = "";
			for ($y = 0; $y < count($acabados); $y++){
				if($acabados[$y]['idModelo']==$encode[$x]['modelo']){
	       				$acabado .=" acab-".$acabados[$y]['idAcabado'];
				}
			}
			
	
			$sql = "SELECT idModelo, nombre
				FROM Categoria,CategoriaModelo
				WHERE id=idCat AND idModelo='".$encode[$x]['modelo']."'";	
			$resultado = mysqli_query($conn, $sql);
			
			$cat = array();
			while($row = mysqli_fetch_assoc($resultado)) {
		   		$cat[] = $row;
			}
		
			$categoria = "";
			$categoria2 = "";
			for ($y = 0; $y < count($cat); $y++){
	       			$categoria .=" data-".$cat[$y]['nombre'];
	       			$categoria2 .= $cat[$y]['nombre']." ";
			}
			
			$precioMueble=$encode[$x]['precio'];
			$descMueble=$encode[$x]['descuento'];  

			if($descMueble==0){
				$money = "<br><br><b> $  $precioMueble MXN  </b><br><br>";
			}
			else
			{
				$descontado = $precioMueble * (1-$descMueble);
				$aDescontar = $descMueble *100;
				$money = "<span class='price'> $  $precioMueble MXN   </span><br> <b> Descuento: $aDescontar %  </b><br><b class='s1 discount'>$ $descontado MXN</b><br><br>";
			}
			
			$resp .= "<div class='card col l3 s4".$categoria.$acabado."' data-visible='V' id='".$y."'>
				<br>
				<div class='card-image'>
				<img class='responsive-img' width='100px' src='img/".$encode[$x]['foto']."'>
				<a href='mueble.php?modelo=".$encode[$x]['modelo']."' class='btn-floating halfway-fab'>
				<i class='material-icons'>zoom_in</i></a>
				</div>
				<div class='card-content'>
				<p><b>".$encode[$x]['nombre']."</b><br>
				<span class='s1'>".$categoria2."<br><br>
				$money
				<p class='exist center'> Existencias: ".$Model['existencias']."</p>
				<a class='waves-effect waves-light btn cat' data-modelo='".$encode[$x]['modelo']."'>A&ntilde;adir al carro</a>
				</div>
				</div>";		
		}
	} 
	echo $resp;
exit;
?>

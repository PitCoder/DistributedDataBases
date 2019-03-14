<?php ini_set('display_errors','on');

$servername = "localhost";
$username = "id2689058_sgviddb";
$password = "distributedDB";
$database = "id2689058_sgviddb";

// RESCATANDO ALL VALUES
	
	$modelo=$_POST['modelo'];
	$precio=$_POST['precio'];
	$nombre=$_POST['nombre'];
	$alto=$_POST['alto'];
	$ancho=$_POST['ancho'];
	$profundidad=$_POST['profundidad'];
	$descuento=$_POST['descuento'];
	$descripcion=$_POST['descripcion'];
	$categorias=$_POST['categorias'];
	$acabados=$_POST['acabados'];
	$materiales=$_POST['materiales'];
	
// CREATE AND CHECK CONNECTION
	
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");
	
	

//STARTS PROGRAM
	$descuento = $descuento/100;
	//insertar el nuevo modelo
	$foto= $modelo.".png"; 
	$sql = "INSERT INTO Modelo values('$modelo','$nombre','$foto',$alto,$ancho,$profundidad,'$descripcion',$precio,$descuento,NULL)";
	$resultado = mysqli_query($conn, $sql);
	if(mysqli_affected_rows($conn)==1)
		{
			//Insertar los acabados que ocupa
			for($i=0; $i<count($acabados);$i++)
				{
					$sql= "INSERT INTO AcabadoModelo values('$modelo',".$acabados[$i].")";
					$resultado = mysqli_query($conn, $sql);
					if(mysqli_affected_rows($conn)!=1)
						{
							echo ("No se puede insertar nada alv Acab");
							break;
						}
				}
			//Insertar los materiales que ocupa
			for($i=0; $i<count($materiales);$i++)
				{
					$sql= "INSERT INTO MaterialModelo values('$modelo',".$materiales[$i].")";
					$resultado3 = mysqli_query($conn, $sql);
					if(mysqli_affected_rows($conn)!=1)
						{
							echo ("No se puede insertar nada alv Mate");
							break;
						}
				}
			//Insertar los categorias que ocupa
			for($i=0; $i<count($categorias);$i++)
				{
					$sql= "INSERT INTO CategoriaModelo values('$modelo',".$categorias[$i].")";
					$resultado = mysqli_query($conn, $sql);
					if(mysqli_affected_rows($conn)!=1)
						{
							echo ("No se puede insertar nada alv Cate");
							break;
						}
				}
	
		}
	
	echo mysqli_affected_rows($conn);
	/*
	$sql = "INSERT INTO Modelo values('$modelo','$nombre','$foto',$alto,$ancho,$profundidad,'$descripcion',$precio,$descuento,NULL)";
	//Insertar los acabados que ocupa
	for($i=0; $i<count($acabados);$i++)
		{
			$sql.="                                                            ";
			$sql.= "INSERT INTO AcabadoModelo values('$modelo',".$acabados[$i].")";
		}
	//Insertar los materiales que ocupa
	for($i=0; $i<count($materiales);$i++)
		{
			$sql.="                                                            ";
			$sql.= "INSERT INTO MaterialModelo values('$modelo',".$materiales[$i].")";
		}
	//Insertar los categorias que ocupa
	for($i=0; $i<count($categorias);$i++)
		{
			$sql.="                                                            ";
			$sql.= "INSERT INTO CategoriaModelo values('$modelo',".$categorias[$i].")";
		}
	echo $sql;*/
exit; ?>
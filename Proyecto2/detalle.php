<?php include('php/classes.php');
session_start();  
if( !isset($_SESSION['user']) || empty($_SESSION['user']) ){
	header("Location: https://sgviddb.000webhostapp.com/DDB2/logout.php");
}//else if( !($_SESSION['user']->administrador()) && !($_SESSION['user']->gerente()) )
//    header("Location: https://sgviddb.000webhostapp.com/DDB2/obra.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Obra - FAS Multibase</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include('code/head.html'); ?>
	<link href="css/own.css" rel="stylesheet" type="text/css">
	<script src="js/detalle.js"></script>

</head>


<body>

	<header>
		<?php include('code/header.html'); ?>
	</header>

	<main>
	    
	<div class="row">
        
		<div class="container content" id="<?php echo $_GET['obra'] ?>">
		</div>
	</div>
	</main>
	<footer class="page-footer grey darken-4">
		<?php include('code/footer.html'); ?>
    </footer>

</body>
</html>

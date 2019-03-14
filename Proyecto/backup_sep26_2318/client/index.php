<?php 
session_start();
if(!isset($_SESSION['correo']) || empty($_SESSION['correo'])) {
   $_SESSION["correo"]="null";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Muebler&iacute;as Quetzal</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include('code/head.html'); ?>
	<link href="css/own.css" rel="stylesheet" type="text/css">
	<script src="js/index.js"></script>
</head>

<body>
	<header>
	<?php include('code/header.html'); ?>
	</header>

	<main>
		<section>
		<div class="slider">
		<ul class="slides">
			<li>
				<img class="responsive-img" src="img/logoIndex.png">
				<div class="caption center-align">
					<h3></h3>
					<h5></h5>
				</div>
			</li>
			<li>
				<img class="responsive-img" src="img/indexH.jpg">
				<div class="caption left-align">
					<div class="slidetitle">
					<h3 class="white-text">Muebler&iacuteas Quetzal</h3>
					<h5 class="white-text">No hay casa sin muebles Quetzal.</h5>
					</div>
				</div>
			</li>
			<li>
				<img class="responsive-img" src="img/indexO.jpg">
				<div class="caption right-align">
					<div class="slidetitle">
					<!--<h3 class="white-text">¿Buscas muebles para tu hogar?</h3>
					<h5 class="white-text">Encu&eacutentralos aqu&iacute al mejor precio.</h5>-->
					<h3 class="white-text">Tampoco hay oficinas sin MQuetzal</h3>
					<h5 class="white-text">Encu&eacutentralos aqu&iacute al mejor precio.</h5>
					</div>
				</div>
			</li>
		</ul>
		</div>
		</section>

		<section class="container">
			<h2 class="center">¡Bienvenido! Ser&aacute un placer atenderte.</h1>
		</section>
		<div class="row container">
			<div class="col l6 right-align">
			<a class="waves-effect waves-light btn" href="catalogo.php">Ver cat&aacutelogo</a>
			</div>
			<div class="col l6 left-align">
			<a class="waves-effect waves-light btn" href="login.php">Iniciar sesi&oacuten</a>
			</div>
		</div>

	</main>

	<footer class="page-footer grey darken-4">
	<?php include('code/footer.html'); ?>
	<a class="right text-grey grey-text" href="http://sgviddb.000webhostapp.com/a/logout.php">*</a>
	</footer>

</body>
</html>

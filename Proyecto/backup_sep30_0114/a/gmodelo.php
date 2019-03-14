<?php 
session_start();
if(!isset($_SESSION['id']) || empty($_SESSION['id'])) {
   $_SESSION["id"]="null";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Muebler&iacute;as Quetzal</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include('code/head.html'); ?>
	<link href="/../../client/css/own.css" rel="stylesheet" type="text/css">
	<script src="js/gmodelo.js"></script>
</head>

<body>
	<header>
	<?php include('code/header.html'); ?>
	</header>

	<main>
		<div class="row col l12">
			<div class="row col l6 s4">
				<div class="row col l12"> <h5>Seleccione lo que desea</h5></div>
				<div class="row col l4 s4" id="Categorias">
					<p>Las categorias</p>
				</div>
				<div class="row col l4 s4" id="Acabados">
					<p>Los acabados</p>
				</div>
				<div class="row col l4 s4" id="Materiales">
					<p>Los materiales</p>
				</div>
			</div>
			<form id="formModelo"  class="row col l6 s4">
				<div class="input-field col l6 s3">
					<input placeholder="CC-MMMM" id="modelo" name="modelo" type="text" data-validetta="required">
					<label for="modelo" class="active">Modelo</label>
				</div>
				<div class="input-field col l6 s3">
					<input id="nombre" name="nombre" type="text" data-validetta="required">
					<label for="nombre">Nombre</label>
				</div>
				<div class="input-field col l6 s3">
					<input placeholder="0.00" id="precio" name="precio" type="text" data-validetta="required">
					<label for="precio" class="active">Precio</label>
				</div>
				<div class="input-field col l6 s3">
					<input placeholder=" 0% -100%" id="descuento" name="descuento" type="text" data-validetta="required,number">
					<label for="descuento">Descuento</label>
				</div>
				<div class="row col l12">
					<p class="range-field col l12 s3">
					Alto (mts): 
					<input type="range" id="alto" name="alto" min="0.1" max="6" step="0.01" />
					</p>

					<p class="range-field col l12 s3">
					Ancho (mts): 
					<input type="range" id="ancho" name="ancho" min="0.1" max="6" step="0.01"/>
					</p>

					<p class="range-field col l12 s3">
					Profundidad (mts): 
					<input type="range" id="prof" name="prof" min="0.1" max="6" step="0.01"/>
					</p>
				</div>
				<div class="input-field col l12 s3">
					<textarea id="desc" name="desc" class="materialize-textarea" data-validetta="required"></textarea>
					<label for="desc">Descripción</label>
				</div>
				<div class="input-field col l12 s3">
					<button type="submit" text-color="white" class="btn black col l12 s6" id="Confirmar">Confirmar</button>
				</div>
			</form>
		</div>
		
	</main>

	<footer class="page-footer grey darken-4">
	<?php include('code/footer.html'); ?>
	</footer>

</body>
</html>
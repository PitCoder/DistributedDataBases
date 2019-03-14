<!DOCTYPE html>
<html lang="es">
<?php 
?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include('code/head.html'); ?>
	<link href="./../client/css/own.css" rel="stylesheet" type="text/css">
	<script src="js/inventario.js"></script>

</head>


<body>

	<header>
		<?php include('code/header.html'); ?>
	</header>

	<main>
	<div class="row">
		<div class="row col l10">
			<div class="row col l12" align="center">
				<h5 >Ingrese un modelo para su b&uacutesqueda en los almacenes seleccionados</h5>
			</div>
			<form id='modeloBusca'>
				<div class="row col l6">
					<div class="row">
						<div class="input-field col l12 s12">
							<input type="text" id="modelo" name="modelo" data-validetta="required">
							<label for="modelo">Modelo:</label>
						</div>
					</div>
						
				
				</div>
				<div class="row col l6">
					<div class="row">
						<div class="input-field col l12 s12">
							<button type="submit" class="btn" style="width:100%;">Buscar</button>
						</div>
					</div>
				</div>
			</form>
			<div class="row col l12 s8" >
				<div class="row" id="Resultados">
				</div>
				<div class="row">
					<div class="col l12 s8">
						<div class="col l6 right-align">
							<a class="waves-effect waves-light btn-flat border" id="Prev">Anteriores</a>
						</div>
						<div class="col l6 left-align">
							<a class="waves-effect waves-light btn" id="Next">Siguientes</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row col l2 s4">
			<div class="row">
				<h5 >Almacenes</h5>
				<div id="Almacenes">
				</div><br>
			</div>
		</div>
	</div>
	</main>
	<footer class="page-footer grey darken-4">
		<?php include('code/footer.html'); ?>
    </footer>

</body>
</html>
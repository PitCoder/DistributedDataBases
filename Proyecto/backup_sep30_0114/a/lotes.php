<!DOCTYPE html>
<html lang="es">
<?php 
?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include('code/head.html'); ?>
	<link href="./../client/css/own.css" rel="stylesheet" type="text/css">
	<script src="js/lotes.js"></script>

</head>


<body>

	<header>
		<?php include('code/header.html'); ?>
	</header>

	<main>
	<div class="row">
		<div class="row col l12 s4">
			<div class="row col l3 s4">
			</div>
			<div class="row col l6 s4">
				<h4>
					<b>Primero ingrese el modelo y la cantidad de dicho lote</b>
				</h4>
				<form id="formLote">
					<div class="input-field col l6 s4">
						<input type="text" id="modelo" name="modelo" data-validetta="required">
						<label for="modelo">Modelo del Lote:</label>
					</div>
					<div class="input-field col l6 s4">
						<input type="text" id="cantidad" name="cantidad" data-validetta="required,number">
						<label for="cantidad">Cantidad total del Lote:</label>
					</div>
					<div class="row col l12 s4 center-align input-field">
						<button type="submit" class="btn green col l12 s6" id="Confirmar">Confirmar</button>
					</div>
				</form>
				<a align="center" class="waves-effect waves-light btn red col l12 s6" id="Cancelar">Cancelar</a>
			</div>
			<div class="row col l3 s4">
			</div>
			
		</div>
		<div class="row col l12 s4" id="Formulario">
			<div class="row col l2 s4">
				<h5> Selecciona tu almac&eacuten </h5>
				<div id="almacenes">
				</div>
			</div>
			<div class="row col l7 s4">
				<div class="input-field col l6 s6">
					<input value="Ninguno" disabled type="text" id="almacenSelec" name="almacenSelec" data-validetta="required">
					<label for="almacenSelec">Almac&eacuten seleccionado:</label>
				</div>
				<div class="input-field col l6 s6">
					<input value="0" disabled type="text" id="cantidadD" name="cantidadD" data-validetta="required">
					<label for="cantidadD">Cantidad disponible:</label>
				</div>
				<form id="formCantidad">
					<div class="input-field col l6 s6">
						<input type="text" id="cantidadA" name="cantidadA" data-validetta="required,number">
						<label for="cantidadA">Cantidad del lote a agregar al almac&eacuten:</label>
					</div>
					<div class="input-field col l6 s6">
						<button type="submit" class="btn blue col l12" >Guardar en almacen</button>
					</div>
				</form>
				<div class="input-field col l6 s6">
					<a class="waves-effect waves-light btn red col l12 s6" id="Borrar">Borrar existencias de este lote del almacen</a>
				</div>
				<div class="input-field col l12 s6">
					<a class="waves-effect waves-light btn green col l12 s6" id="Terminar">Terminar guardado de Lote</a>
				</div>
			</div>
			<div class="row col l3 s4">
				<h5>Almacenes que contienen parte del Lote</h5>
				<div class="row col l6" align="center">
					<p>Almac&eacuten</p>
				</div>
				<div class="row col l6" align="center">
					<p>Cantidad del lote que guardar&aacute</p>
				</div>

				<div id="seleccionados">
					<div class="card row col l12">
					</div>
				</div>
			</div>
		</div>
	</div>
	
	</main>
	<footer class="page-footer grey darken-4">
		<?php include('code/footer.html'); ?>
    </footer>

</body>
</html>
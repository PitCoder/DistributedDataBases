<!DOCTYPE html>
<html lang="es">
<head>
	<title>Muebler&iacute;as Quetzal</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include('code/head.html'); ?>
	<link href="css/own.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV5XgNMYi1umMP6ykYvN5adqkke4MejOk"></script>
	<script type="text/javascript" src="code/jquery.googlemap.js"></script>
	<script src="js/ordenEnvio.js"></script>
</head>

<body>

	<header>
		<?php include('code/header.html'); ?>
	</header>

	<main>
		<div class="row container">
			<div class="col l12 s12">
			<form id="formEnvio">
        	<fieldset><legend>&nbsp;Datos de Envio&nbsp;</legend>

		        <div class="input-field col l12 s12">
	        		<input type="text" id="calle" name="calle" data-validetta="required">
                	<label for="calle">Calle:</label>
	        	</div>

	        	<div class="col l5 s5">
	        		<div class="input-field">
		        		<input type="text" id="noExt" name="noExt" data-validetta="required">
		        		<label for="noExt">Número Exterior:</label>
		        	</div>
		        	<div class="input-field">
		        		<input type="text" id="noInt" name="noInt" data-validetta="required">
		        		<label for="noInt">Número Interior:</label>
		        	</div>
		        	<div class="input-field">
		        		<input type="text" id="codpost" name="codpost" data-validetta="required">
		        		<label for="codpost">Código Postal:</label>
		        	</div>
		        	<div class="input-field">
		        		<button id="proof" type="submit" class="btn">Continuar</button>
		        	</div>
		        </div>

		        <div class="col l7 s7 grey">
			<div id="map">
			</div>
			</div>
	        </fieldset>
        	</form>
			</div>
		</div>
	</main>

	<footer class="page-footer grey darken-4">
		<?php include('code/footer.html'); ?>
    </footer>

</body>
</html>

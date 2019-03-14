<!DOCTYPE html>
<html lang="es">
<head>
	<title>Muebler&iacute;as Quetzal</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include('code/head.html'); ?>
	<link href="css/own.css" rel="stylesheet" type="text/css">
	<script src="js/contacto.js"></script>
</head>

<body>

	<header>
		<?php include('code/header.html'); ?>
	</header>

	<main>
		<div class="row container">
			<form id="formContacto">
	        <fieldset><legend>&nbsp;Datos de Contacto&nbsp;</legend>

	        	<div class="row">
	        		<div class="input-field col l6 s12">
		                <input type="text" id="nombre" name="nombre" data-validetta="required">
		                <label for="nombre">Nombre:</label>
	            	</div>
	            	<div class="input-field col l6 s12">
		                <input type="email" id="correo" name="correo" data-validetta="required">
		                <label for="correo">Correo Electr&oacute;nico:</label>
	            	</div>
	        	</div>

        		<div class="input-field">
                    <input type="text" id="telefono" name="telefono" data-validetta="required">
                    <label for="telefono">Tel&eacute;fono:</label>
                </div>

                <div class="input-field col l10 s10 center">
	            	<textarea id="mensaje" name="mensaje" class="materialize-textarea" data-validetta="required"></textarea>
          			<label for="mensaje">Mensaje:</label>
                </div>

                <div class="row">
		            <div class="input-field col l6 s6">
		                <button type="submit" class="btn" style="width:100%;">Enviar correo</button>
		            </div>
		            <div class="col l6 s6 grey-text text-darken-1 center">
		            	<br>Atención a Clientes
		            	<br>(55)-57296001 Ext. 40864
                                <br>sgviquetzal@gmail.com
		            </div>
	            </div>

	        </fieldset>
        	</form>
		</div>
	</main>

	<footer class="page-footer grey darken-4">
		<?php include('code/footer.html'); ?>
    </footer>

</body>
</html>

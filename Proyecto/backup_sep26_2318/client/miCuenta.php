<?php
session_start();
if($_SESSION["correo"]=="null"){ header("Location: https://sgviddb.000webhostapp.com/client/login.php");
die();}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Muebler&iacute;as Quetzal</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include('code/head.html'); ?>
        <link href="css/own.css" rel="stylesheet" type="text/css">
	<script src="js/micuenta.js"></script>

</head>

<body>

	<header>
		<?php include('code/header.html'); ?>
	</header>
								
	<main>
		<div class="row">
			<div class="col l1">
			</div>
			<div class="col l10 titulo">
				<h4 class="black-text">Mi Cuenta</h4>
			</div>
			<div class="col l1">
			</div>
		</div>
		<div class="row">
			<div class="col l4 s4">
				<div class="collection">
					<a class="collection-item active" id="datos">Mis Datos</a>
					<a class="collection-item" id="orden">Ordenes de Envio</a>
				</div>
			</div>

			<div id="cuenta-data" class="col l8 s8">
			<form id="formUpdate">
	        <fieldset><legend>&nbsp;Datos Personales&nbsp;</legend>

	        	<div class="row">
	        		<div class="input-field col l6 s12">
		                <input type="text" id="nombre" name="nombre" data-validetta="required">
		                <label for="nombre">Nombre:</label>
	            	</div>
	            	<div class="input-field col l6 s12">
		                <input type="email" id="correo" name="correo" data-validetta="required,email">
		                <label for="correo">Correo Electr&oacute;nico:</label>
	            	</div>
	        	</div>

	        	<div class="row">
	        		<div class="col s12 l6 input-field">
	                    <input type="text" id="telefono" name="telefono" data-validetta="required,maxLength[10],minLength[10],number">
	                    <label for="telefono">Tel&eacute;fono:</label>
	                </div>
	                <div class="col s12 l6 input-field">
	                   <p class="grey-text"><b>¿Des&eacute;a recibir notificaciones?</b><br>

	                   		<input name="group" type="radio" id="notify" class="with-gap" value="true"/>
      						<label for="notify">Si</label><span>      </span>

						    <input name="group" type="radio" id="pop" class="with-gap" value="false"/>
						    <label for="pop">No</label>

	                   </p>
	                </div>	
	        	</div>

				<div class="row">
	        		<div class="col s12 l6 input-field">
	                    <input type="password" id="contrasena" name="contrasena" data-validetta="required">
	                    <label for="contrasena">Nueva Contrase&ntilde;a:</label>
	                </div>
	                <div class="col s12 l6 input-field">
	                    <input type="password" id="validacion" name="validacion" data-validetta="required,equalTo[contrasena]">
	                    <label for="validacion">Validaci&oacute;n de nueva contrase&ntilde;a:</label>
	            	</div> 
	        	</div>

	        	<div class="row">
	        		<div class="col s12 l6 input-field">
	                    <input type="password" id="older" name="older" data-validetta="required">
	                    <label for="older">Contrase&ntilde;a Antigua:</label>
	                </div>
		            <div class="input-field col l6 s12">
		                <button type="submit" class="btn" style="width:100%;">Guardar Cambios</button>
		            </div>
	            </div>

	        </fieldset>
        	</form>
			</div>

			<div id="cuenta-ordenes" class="col l8">
			<table class="highlight">
					<thead>
						<tr>
							<th>No. Orden</th>
							<th>No. Muebles</th>
							<th>Status</th>
							<th>Estimado</th>
							<th>Entregado</th>
                                                         <th>Precio total</th>
							<th>PDF</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
			</table>
			</div>
		</div>
	</main>

	<footer class="page-footer grey darken-4">
		<?php include('code/footer.html'); ?>
    </footer>

</body>
</html>

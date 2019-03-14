<!DOCTYPE html>
<html lang="es">
<head>
	<title>Ingreso: Mi Cuenta</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include('code/head.html'); ?>
	<link type="text/css" rel="stylesheet" href="css/own.css">
	<script src="js/login.js"></script>


</head>

<body>

	<header>
		<?php include('code/header.html'); ?>
	</header>

	<main>
		<div class="row orange">
			<div class="col l1">
			</div>
			<div class="col l11">
				<h4 class="black-text">Ingreso a Mi Cuenta</h4>				
			</div>
		</div>

		<div class="row">
			<div class="col l1"></div>

			<div class="col l6">
			<form id="formSignup">
	        <fieldset><legend>&nbsp;Sign Up&nbsp;</legend>

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
	                    <input type="password" id="contrasena" name="contrasena" data-validetta="required">
	                    <label for="contrasena">Contrase&ntilde;a:</label>
	                </div>
	                <div class="col s12 l6 input-field">
	                    <input type="password" id="validacion" name="validacion" data-validetta="requiered,equalTo[contrasena]">
	                    <label for="validacion">Validaci&oacute;n contrase&ntilde;a:</label>
	            	</div> 
	        	</div>

	        	<div class="row">
	        		<div class="col s12 l6 input-field">
	                    <input type="text" id="telefono" name="telefono" data-validetta="required,number,minLength[10],maxLength[10]">
	                    <label for="telefono">Tel&eacute;fono:</label>
	                </div>
	                <div class="col s12 l6 input-field">
	                   <p class="grey-text"><b>¿Des&eacute;a recibir notificaciones?</b><br>

	                   		<input name="group" type="radio" id="notify" value="true" class="with-gap" checked=""/>
      						<label for="notify">Si</label><span>      </span>

						    <input name="group" type="radio" id="pop" value="false" class="with-gap"/>
						    <label for="pop">No</label>
						    
	                   </p>
	                </div>	
	        	</div>

	            <div class="input-field col l6 s12">
	                <button type="submit" class="btn" style="width:100%;">Crear Cuenta</button>
	            </div>

	        </fieldset>
        	</form>
			</div>

			<div class="col l4">
			<form id="formLogin">
	        <fieldset><legend>&nbsp;Log In&nbsp;</legend>

		        <div class="row">
		        	<div class="input-field">
		                <input type="email" id="correoU" name="correoU" data-validetta="required,email">
		                <label for="correoU">Correo Electr&oacute;nico:</label>
	            	</div>
		        </div>   

		        <div class="row">
		        	<div class="input-field">
	                    <input type="password" id="contrasenaU" name="contrasenaU" data-validetta="required">
	                    <label for="contrasenaU">Contrase&ntilde;a:</label>
	                </div>
		        </div>

		        <div class="row">
		        	<div class="input-field col l6 s12">
		                <button type="submit" class="btn" style="width:100%;">Entrar</button>
		            </div>
		        </div>

	        </fieldset>
        	</form>
			</div>

			<div class="col l1"></div>
		</div>
	</main>

	<footer class="page-footer grey darken-4">
		<?php include('code/footer.html'); ?>
    </footer>

</body>
</html>

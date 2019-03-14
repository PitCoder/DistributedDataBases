<!DOCTYPE html>
<html lang="es">
<head>
	<title>TAktuar - FAS Multibase</title>
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
		<div class="row">
			
			<div class="container">
				<h2 align=center> Furniture Administration Multibase System (FAS) </h2>
				<h5 align=center> Ingrese su identificador de usuario de Teatro Aktuar y su contrase&ntildea para acceder </h5>

			<div class="container">
			<form id="formLogin">
	        		<div class="input-field col l12 s12">
		                	<input type="text" id="id" name="id" data-validetta="required">
			                <label for="id">Id Usuario:</label>
	            		</div>
	        		<div class="col s12 l12 input-field">
	        	            <input type="password" id="contrasena" name="contrasena" data-validetta="required">
		                    <label for="contrasena">Contrase&ntilde;a:</label>
	               		</div>
	               		
	               		<div class="col l6 s12"> </div>
	               		
	              		<div class="input-field col l6 s12">
		                	<button type="submit" class="btn" style="width:100%;">Entrar</button>
		            	</div>
		        </form>
			</div>
		        
			</div>
		</div>
	</main>

	<footer class="page-footer grey darken-4">
	<?php include('code/footer.html'); ?>
	</footer>

</body>
</html>

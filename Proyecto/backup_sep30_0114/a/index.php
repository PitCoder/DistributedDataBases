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
	<!--<script src="js/index.js"></script>-->
</head>

<body>
	<header>
	<?php include('code/header.html'); ?>
	</header>

	<main>
		<div class="row">
			<div class="row col l4 s4">
				
			</div>
			
			<div class="row col l4 s4">
				<div class="col l12 s4"> <h1 align=center> Muebler&iacuteas Quetzal </h1> </div>
				<div class="col l12 s4"> <h5 align=center> Ingese su identificador de empleado y su contrase&ntildea para acceder </h5> </div>
	        		<div class="input-field col l12 s12">
		                <input type="text" id="nombre" name="nombre" data-validetta="required">
		                <label for="nombre">Nombre:</label>
	            		</div>
	        		<div class="col s12 l12 input-field">
	        	            <input type="password" id="contrasena" name="contrasena" data-validetta="required">
		                    <label for="contrasena">Contrase&ntilde;a:</label>
	               		</div>
	               		<div class="col l6 s12">  </div>
	              		<div class="input-field col l6 s12">
		                <button type="submit" class="btn" style="width:100%;">Entrar</button>
		            	</div>
			</div>
			<div class="row col l4 s4">
				
			</div>
		</div>
	</main>

	<footer class="page-footer grey darken-4">
	<?php include('code/footer.html'); ?>
	</footer>

</body>
</html>
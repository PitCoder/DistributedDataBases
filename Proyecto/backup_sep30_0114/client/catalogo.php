<!DOCTYPE html>
<html lang="es">
<head>
	<title>Muebler&iacute;as Quetzal</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include('code/head.html'); ?>
	<link href="css/own.css" rel="stylesheet" type="text/css">
	<script src="js/catalogo.js"></script>

</head>

<body>

	<header>
		<?php include('code/header.html'); ?>
	</header>

	<main>
		<div class="row">
			<div class="col l2 s4">
				<div class="row">
					<h5 >Categoría</h5>
					<ul class="collection categoria">
						<a  class="collection-item " id="H">Hogar</a>
						<a class="collection-item " id="O">Oficina</a>
                                                <a class="collection-item active" id="T">Mostrar todos</a>
			    		</ul><br>

			    		<h5 >Acabado</h5>
			    			<div id="Acabados" class="row">
			    			</div>
				</div>
			</div>
			<div class="col l10 s8">
				<div id="modelos" class="row">

				
				</div>
			</div>
			<div class="row">
				<div class="col l2 s4"></div>
				<div class="col l10 s8">
					<div class="col l6 right-align">
						<a class="waves-effect waves-light btn-flat border" id="Prev">Anteriores</a>
					</div>
					<div class="col l6 left-align">
						<a class="waves-effect waves-light btn" id="Next">Siguientes</a>
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
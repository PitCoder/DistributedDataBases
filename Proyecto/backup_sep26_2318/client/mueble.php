<!DOCTYPE html>
<html lang="es">
<?php 
$modelo = $_GET['modelo'];
$btnCarro = '<a class="waves-effect waves-light btn cat" id="Carro">A&ntilde;adir al carro</a>';
$title = '<title data-modelo="'.$modelo.'">Muebler&iacuteas Quetzal</title>';
?>

<head>
	<?php echo $title; ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include('code/head.html'); ?>
	<link href="css/own.css" rel="stylesheet" type="text/css">
	<script  src="js/mueble.js"></script>

</head>


<body>

	<header>
		<?php include('code/header.html'); ?>
	</header>

	<main>
		<div class="row">
			<div class="col l1"></div>

			<div class="card col l5 foto">
				<br>
				<div class="card-image col l12">
					<div id="fotoMueble"></div>
					<br>
				</div>
				<div class="card-content col l12">
					<b>Descripción:</b>
					<div  id="descripMueble"></div>
				</div>
			</div>

			<div class="card col l5">
				<br>
				<div class="card-content ">
					<div id="nombreMueble"> </div>
					<div id="existenciasMueble"></div>

					<div class="row">
					<ul>
						<div id="catMueble"></div>
						<div id="txtModelo"></div>
					</ul>
				</div>

				<div class="row">
					<b>Especificaciones</b>
					<table class="highlight espec borde">
					<tbody>
						<div id="acabMueble"></div>
							<tr>
								<div id="medidMueble"></div>
							</tr>
						</tbody>
						</table>
						<br>
					</div>
					
					<div class="row last-row">
						<div class="col l6">
							<div id="preMueble"></div>

							
						</div>

						<div class="col l6">
						<?php echo $btnCarro;?>
						</div>
						</div>
					</div>
				<br><br>
				</div>
			</div>
		</div>
	</main>

	<footer class="page-footer grey darken-4">
		<?php include('code/footer.html'); ?>
    </footer>

</body>
</html>

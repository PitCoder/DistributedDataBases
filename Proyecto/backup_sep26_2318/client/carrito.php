<!DOCTYPE html>
<html lang="es">
<head>
	<title>Muebler&iacute;as Quetzal</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php include('code/head.html'); ?>
	<link type="text/css" rel="stylesheet" href="css/own.css">
	<script src="js/carrito.js"></script>

</head>

<body>

	<header>
		<?php include('code/header.html'); ?>
	</header>

	<main>
		<div class="row container">
			<table class="highlight">
				<thead>
					<tr>
						<th>Foro</th>
						<th>Producto</th>
						<th>Clave</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Total</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody id="Articulos">
									</tbody>
			</table>
			<a href="catalogo.php" class="btn-flat border">Continuar Comprando</a>
			<a class="btn-flat border right" id='elTol'>Borrar Carrito</a>
		</div>

		<div class="row container">
			<div class="col l1 right"></div>

			<div class="card col l4 right">
			<div class="card-content">
				<span class="card-title">TOTAL</span>
				<table class="highlight grey-lighten-4">
					<tr>
						<td>Subtotal</td>
						<td id='subtotal'></td>
					</tr>
					<tr>
						<td>IVA</td>
						<td id='iva'></td>
					</tr>
					<tr>
						<td>total</td>
						<td id='total'></td>
					</tr>
				</table>
				<p class="center"><a id="comprar" class="btn">Comprar</a></p>
			</div>
			</div>
		</div>
	</main>

	<footer class="page-footer grey darken-4">
		<?php include('code/footer.html'); ?>
    </footer>

</body>
</html>

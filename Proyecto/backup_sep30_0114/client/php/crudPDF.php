<?php ini_set('display_errors','on');

$servername = "localhost";
$username = "id2689058_sgviddb";
$password = "distributedDB";
$database = "id2689058_sgviddb";
	
	$conn = mysqli_connect($servername ,$username ,$password ,$database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");

	include("mPDF/mpdf60/mpdf.php");


// STARTS PROGRAM
	session_start();
	$user = $_SESSION["correo"];

	$id= $_GET["id"]; /*Este me servirá en WHERE id = $*/
	/*$idCliente= $_GET["idCliente"]; Este me servirá en AND idCliente = $*/
	/*$idCompra = $_GET["idCompra"]; Este me servirá en AND idCompra = $*/
	/*$idAlmacen = $_GET["idAlmacen"]; Este me servirá en AND idAlmacen = $
	
	$precio = $ordenes[$x]['total']+$ordenes[$x]['iva'];
        $precio = number_format($precio,2,'.',',');
	*/
	
	$ordenes = array();
	
	$sql = "SELECT idCliente, idAlmacen, id, fecha, total, iva, fechaEnt, dir, cp 
		FROM Compra, Envio
		WHERE id=idCompra
		AND idCliente='$user'
		AND id=".$id;
echo $sql;

	$res = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($res)) {
		$ordenes[] = $row;
	}

	$sql = "SELECT idModelo, categoria, nombre, precioI, descuentoI, numero, dimenAlto, dimenAncho, dimenProfundidad, foto, descripcion
		FROM Compra AS C, ModeloCompra, Modelo 
		WHERE idModelo=Modelo 
		AND idCompra=C.id  AND C.id=".$id;
		
	$res = mysqli_query($conn, $sql);    
	$encode = array();
	
	while($row = mysqli_fetch_assoc($res)) {
		$encode[] = $row;
	}

	$mpdf = new mPDF();
	
	$html = "
	<h1>QUETZAL MOBILIARIA</h1>
	<h3>RECIBO DE COMPRA</h3>
	<style>
		table{ font-family: arial; }
		td{ text-align:center; }
		th{ background-color:#099; color:#FFF; }
	</style>
	<table width='100%'>
	
	<thead>
		<tr>
		<th>ID Cliente</th>
		<th>ID Almac&eacute;n</th>
		<th>ID Compra</th><th>Fecha</th>
		<th>Precio Total</th>
		<th>IVA</th>
		<th>Fecha Estimada</th>
		<th>Calle</th>
		<th>N&uacute;mero</th>
		<th>CP</th>
		</tr>
	</thead>
	
	<tbody>
		<tr>
		<td>$ordenes[0]</td>
		<td>$ordenes[1]</td>
		<td>$ordenes[2]</td>
		<td>$ordenes[3]</td>
		<td>$ordenes[4]</td>
		<td>$ordenes[5]</td>
		<td>$ordenes[6]</td>
		<td>$ordenes[7]</td>
		<td>$ordenes[8]</td>
		<td>$ordenes[9]</td>
		</tr>
	</tbody>
	
	<thead>
		<tr>
		<th>ID Modelo</th>
		<th>Categor&iacute;a</th>
		<th>Nombre</th>
		<th>Precio Individual</th>
		<th>Descuento Individual</th>
		<th>N&uacute;mero</th>
		<th>Dimensi&oacute;n Alto</th>
		<th>Dimensi&oacute;n Ancho</th>
		<th>Dimensi&oacute;n Profundidad</th>
		<th>Foto</th>
		<th>Descripci&oacute;n</th>
		</tr>
	</thead>
	
	<tbody>";

	for($x = 0; $x < count($encode); $x++){
		$html .=  "<tr>
			<td>".$encode[$x]['idModelo']."</td>
			<td>".$encode[$x]['categoria']."</td>
			<td>".$encode[$x]['nombre']."</td>
			<td>".$encode[$x]['precioI']."</td>
			<td>".$encode[$x]['descuentoI']."</td>
			<td>".$encode[$x]['numero']."</td>
			<td>".$encode[$x]['dimenAlto']."</td>
			<td>".$encode[$x]['dimenAncho']."</td>
			<td>".$encode[$x]['dimenProfundidad']."</td>
			<td>".$encode[$x]['foto']."</td>
			<td>".$encode[$x]['descripcion']."</td>
			</tr>";
	}

	$html .= "</tbody></table>";

$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

/* CONSULTAS 

Detalle de una compra especifica

	SELECT idModelo, precio, descuento, Rotacion.cantidad
	FROM CompraMueble, Rotacion, Lote
	WHERE operacion=idOperacion
	AND lote=idLote
	AND idCompra=$idCompra;

Detalle para un mueble específico

	SELECT nombre, foto, dimenAlto, dimenAncho, dimenProfun, descrip
	FROM Modelo
	WHERE modelo='H-0001';
		se debería agregar el estado del mueble.

*/
?>
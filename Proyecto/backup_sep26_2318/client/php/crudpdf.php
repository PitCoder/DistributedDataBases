<?php
	$servername = "localhost";
	$username = "id1895415_sgvi";
	$password = "sgviWH";
	$database = "id1895415_sgvi";
	
	$conexion = mysqli_connect($servername ,$username ,$password ,$database);
	mysqli_query($conexion, "SET NAMES 'utf8'");
	if(mysqli_connect_errno()){
		die("Problemas con la conexi&oacute;n a la BD: ".mysqli_connect_error());
	}

	include("mPDF/mpdf60/mpdf.php");

	$id= $_GET["id"]; /*Este me servirá en WHERE id = $*/
	/*$idCliente= $_GET["idCliente"]; Este me servirá en AND idCliente = $*/
	/*$idCompra = $_GET["idCompra"]; Este me servirá en AND idCompra = $*/
	/*$idAlmacen = $_GET["idAlmacen"]; Este me servirá en AND idAlmacen = $*/
	
	$sql = "SELECT idCliente, idAlmacen, idCompra, fecha, precioTotal, iva, fechaEstimada, dirCalle, dirNumero, dirCP 
		FROM Compra, OrdenEnvio WHERE id=idCompra 
		 AND idCompra=".$id;


	$res = mysqli_query($conexion,$sql);

	$ordenenvio = mysqli_fetch_row($res);

	$sql2 = "SELECT idModelo, categoria, nombre, precioI, descuentoI, numero, dimenAlto, dimenAncho, dimenProfundidad, foto, descripcion
		FROM Compra AS C, ModeloCompra, Modelo 
		WHERE idModelo=Modelo 
		AND idCompra=C.id  AND C.id=".$id;
        $resultado = mysqli_query($conexion, $sql2);    
  $encode = array();
  while($row = mysqli_fetch_assoc($resultado)) {
      $encode[] = $row;
  }
        
	$mpdf = new mPDF();
	$html ="
	<h1>QUETZAL MOBILIARIA</h1>
	<h3>RECIBO DE COMPRA</h3>
	<style>
		table{ font-family: arial; }
		td{ text-align:center; }
		th{ background-color:#099; color:#FFF; }
	</style>
	<table width='100%'>
		<thead>
			<tr><th>ID Cliente</th><th>ID Almac&eacute;n</th><th>ID Compra</th><th>Fecha</th><th>Precio Total</th><th>IVA</th><th>Fecha Estimada</th><th>Calle</th><th>N&uacute;mero</th><th>CP</th></tr>
		</thead>
		<tbody>
			<tr>
			<td>$ordenenvio[0]</td><td>$ordenenvio[1]</td><td>$ordenenvio[2]</td><td>$ordenenvio[3]</td><td>$ordenenvio[4]</td><td>$ordenenvio[5]</td><td>$ordenenvio[6]</td><td>$ordenenvio[7]</td><td>$ordenenvio[8]</td><td>$ordenenvio[9]</td>
			</tr>
		</tbody>
		<thead>
			<tr><th>ID Modelo</th><th>Categor&iacute;a</th><th>Nombre</th><th>Precio Individual</th><th>Descuento Individual</th><th>N&uacute;mero</th><th>Dimensi&oacute;n Alto</th><th>Dimensi&oacute;n Ancho</th><th>Dimensi&oacute;n Profundidad</th><th>Foto</th><th>Descripci&oacute;n</th></tr>
		</thead>
		<tbody>
		";

            for($x = 0; $x < count($encode); $x++){
               $html .=  "<tr>
			<td>".$encode[$x]['idModelo']."</td><td>".$encode[$x]['categoria']."</td><td>".$encode[$x]['nombre']."</td><td>".$encode[$x]['precioI']."</td><td>".$encode[$x]['descuentoI']."</td><td>".$encode[$x]['numero']."</td><td>".$encode[$x]['dimenAlto']."</td><td>".$encode[$x]['dimenAncho']."</td><td>".$encode[$x]['dimenProfundidad']."</td><td>".$encode[$x]['foto']."</td><td>".$encode[$x]['descripcion']."</td>
			</tr>";}
		$html .= "</tbody>
	</table>
	";

	$mpdf->WriteHTML($html);
	$mpdf->Output();
exit;
?>

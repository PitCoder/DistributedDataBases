<?php include('php/classes.php');
session_start();  
if( !isset($_SESSION['user']) || empty($_SESSION['user']) ){
	header("Location: https://sgviddb.000webhostapp.com/DDB2/logout.php");
}else if( !($_SESSION['user']->administrador()) && !($_SESSION['user']->gerente()) )
    header("Location: https://sgviddb.000webhostapp.com/DDB2/obra.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Ordenes - FAS Multibase</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include('code/head.html'); ?>
	<link href="css/own.css" rel="stylesheet" type="text/css">
	<script src="js/ordenesCr.js"></script>
</head>

<body>

	<header>
		<?php include('code/header.html'); ?>
	</header>

	<main>
	    <div class="row col l12">
	            <div id="inicio" class="row col l12">
    	            <div class="row col l3 s4"></div>
        	        <div class="row col l6 s4" align="center">
            			<h4>
            				<b>Primero ingrese el ID de la obra, para hacer la orden correspondiente</b>
            			</h4>
            			<form id="formObra">
            				<div class="input-field col l6 s4">
            					<input type="text" id="id_obra" name="id_obra" data-validetta="required">
            					<label for="id_obra">ID Obra:</label>
            				</div>
            				<div class="row col l6 s4 center-align input-field">
            					<button type="submit" class="btn green col l12 s6" id="Confirmar">Confirmar</button>
            				</div>
            			</form>
            		</div>
    	            <div class="row col l3 s4"></div>
    	        </div>
				 <div id="proceso" class="row col l12">
    	            <div class="row col l3 s4" id="AuxiliarPruebas"></div>
        	        <div class="row col l6 s4 center-align input-field">
						<button type="submit" class="btn red col l12 s6" id="Cancelar">Cancelar</button>
            		</div>
    	            <div class="row col l3 s4"></div>
        	        <div class="row col l12">
        	            <div class="row col l6" id="InfoObra">
        	                
        	            </div>
						<div class="row col l6">
        	                <form id="formOrden">
								<div class="input-field col l6 s4">
									<input value="Inexistente" disabled type="text" id="ObraAux" name="ObraAux" data-validetta="required">
									<label for="ObraAux">ID Obra:</label>
								</div>
								<div class="row col l12 s4 center-align input-field">
									<button type="submit" class="btn blue col l12 s6">Crear Orden</button>
								</div>
							</form>

        	            </div>
        	        </div>
    	        </div>
				
	    </div>
	    
	    
	    
	</main>
	<footer class="page-footer grey darken-4">
		<?php include('code/footer.html'); ?>
    </footer>

</body>
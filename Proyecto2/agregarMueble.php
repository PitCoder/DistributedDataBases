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
	<title>Utiler&iacute;as - FAS Multibase</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include('code/head.html'); ?>
	<link href="css/own.css" rel="stylesheet" type="text/css">
	<script src="js/agregarMueble.js"></script>
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
            				<b>Primero ingrese el ID de la obra deseada</b>
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
				<div class = "row col l12 "id="imagenEspera1" align="center"> <img class='responsive-img' width='20%' src='img/cargando.gif'> </div>
    	        <div id="proceso" class="row col l12">
    	            <div class="row col l3 s4" id="AuxiliarPruebas"></div>
        	        <div class="row col l6 s4" align="center">
            			<h4 class="row col l8 s4">
            				<b>Ahora seleccione los muebles para dicha obra</b>
            			</h4>
            			<div class="row col l4 s4 center-align input-field">
            				<button type="submit" class="btn red col l12 s6" id="Cancelar">Cancelar</button>
            			</div>
            		</div>
    	            <div class="row col l3 s4"></div>
        	        <div class="row col l12">
        	            <div class="row col l8" id="Muebles">
        	                
        	            </div>
        	            <div class="row col l4">
        	                <h5> Muebles agregados: </h5>
							<div class='card row col l12'><div class='col l4'>Modelo: </div><div class='col l4' align='center'>Nombre: </div>
							<div class='col l4' align='center'>Cantidad actual: </div></div>
							<div id="Agregados"></div>
							<div class="input-field col l12 s6">
								<a class="waves-effect waves-light btn blue col l12 s6" id="Terminar">Terminar</a>
							</div>
        	            </div>
        	        </div>
					<div class="row col l8 s4">
						<div class="col l6 right-align">
							<a class="waves-effect waves-light btn-flat border" id="Prev">Anteriores</a>
						</div>
						<div class="col l6 left-align">
							<a class="waves-effect waves-light btn" id="Next">Siguientes</a>
						</div>
					</div>
					<div class="row col l4"></div>
    	        </div>
	    </div>
	    
	    
	    
	</main>
	<footer class="page-footer grey darken-4">
		<?php include('code/footer.html'); ?>
    </footer>

</body>
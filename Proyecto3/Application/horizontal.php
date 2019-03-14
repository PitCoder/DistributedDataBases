<!DOCTYPE html>
<html lang="es">
<head>
	<title>Muebler&iacute;as Quetzal</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include('code/head.html'); ?>
	<link href="css/own.css" rel="stylesheet" type="text/css">
    <script src="js/horizontal.js"></script>

</head>

<body>

	<header>
		<?php include('code/header.html'); ?>
	</header>

	<main>
	        <div class="container center"><h3>Fragmentaci&oacute;n Horizontal</h3></div>
    	    <div class="row">
    	        <div class="col l4">
    	            
                    <ul id="dropdown2" class="dropdown-content">
                        <!-- WITH AJAX SHOULD LOAD -->
                        <!--li><a id="all"></a></li>
                        <li><a id="all2"></a></li-->
                    </ul>
                    
                    <div class="right">
                    <h5>Relaci&oacute;n:</h5>
                    <a class="btn dropdown-button orange left-align" id="filtro" data-activates="dropdown2" style="min-width:160px">
                        Escoge<span class="glyphicon glyphicon-triangle-bottom s3"></span>
                    </a>
                    </div>
                </div>
                
                <div class="col l7">
                    
                    <div>
                        <h5>Atributos: <span class="grey-text"> Escoja un atributo de los siguientes</span></h5>
                    </div>
                    
                    <div id="attributes">
                        <!-- WITH AJAX SHOULD APEAR -->
                        <!--div class="chip orange">PK</div>
                        <div class="chip">llave Candidata</div>
                        <div class="chip">Atributo no Primo</div>
                        <div class="chip">No primo</div>
                        <div class="chip">Otro no primo</div>
                        <div class="chip">otro mas</div>
                        <div class="chip">Foreign Key</div>
                        <div class="chip">FK</div-->
                    </div>
                </div>
    	    </div>
    	    
    	    <div class="row col l12">
				<div class="row col l6">
					<div class="col l4"></div>
					<div class="col l8">
						<h5>Predicado Simple:</h5>
						<div class="row">
							<div class="row col 2 r4"></div>
							<div class="row col 8 r4">
								<div class="col l12" style="padding-top:10px">
									<h5 id="atributo" class="grey-text">Atributo</h5>
								</div>
								<div class="input-field col l12">
									<select id="operadores">
										<option selected disabled value="">Selecciona una opci&oacute;n</option>
										<option class="operaciones" value="2">=</option>
										<option value="3">></option>
										<option value="3"><</option>
										<option value="3">>=</option>
										<option value="3"><=</option>
										<option value="3">!=</option>
										<option value="1">LIKE</option>
									</select>
									<label>Operadores</label>
								</div>
								<div class="input-field col l12">
									<input value="" id="c" type="text">
									<label for="c">Valor</label>
								</div>
								<a class="waves-effect waves-light btn right orange" id="agregar">Agregar</a>
							</div>
						</div>
					</div>
				</div>
                <div class="col l6">
					<div class="col l8">
						<h5>Predicados Simples:</h5>
						<div class="row col l12 r4" id="predicados"></div>
						<div class="row col l12 r4 rigth">
							<a class="waves-effect waves-light btn right dark" id="Fragmentar">Fragmentar</a>
						</div>
					</div>
					<div class="col l4"></div>
                </div>
                    
    	    </div>
			<div class="row col l12 r4">
				<div class="row col l1"></div>
				<div class="row col l10 r4" id="fragMin">
				</div>
				<div class="row col l1"></div>
			</div>
    	    <!--div class="container"><button class="btn right">Next</button></div-->
	</main>

	<footer class="page-footer grey darken-4">
		<?php include('code/footer.html'); ?>
    </footer>

</body>
</html>

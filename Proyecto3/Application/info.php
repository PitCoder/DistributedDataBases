<!DOCTYPE html>
<html lang="es">
<head>
	<title>Muebler&iacute;as Quetzal</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include('code/head.html'); ?>
	<link href="css/own.css" rel="stylesheet" type="text/css">
    <script src="js/info.js"></script>

</head>

<body>

	<header>
		<?php include('code/header.html'); ?>
	</header>

	<main>
	        <div class="container center"><h3>Informaci&oacute;n de Fragmentos</h3></div>
			<div class="row">
    	        <div class="col l4">
    	            
                    <ul id="dropdown2" class="dropdown-content">
                        <li><a id="0">MQuetzal</a></li>
                        <li><a id="1">Sitio 1</a></li>
                        <li><a id="2">Sitio 2</a></li>
                        <li><a id="3">Sitio 3</a></li>
                    </ul>
                    
                    <div class="right"><h5>Sitio:</h5>
                    <a class="btn dropdown-button orange left-align" id="filtro" data-activates="dropdown2" style="min-width:160px">Escoge
                        <span class="glyphicon glyphicon-triangle-bottom s3"></span>
                    </a>
                    </div>
                </div>
                
                <div class="col l7">
                    
                    <div>
                        <h5>Relacion: <span class="grey-text"> Escoja la relaci&oacute;n para consultar</span></h5>
                    </div>
                    
                    <div>
                        <select name="atributes" id="attributes">
                            <!--option selected name="0" value="0">PK</option>
                            <option name="1" value="1">Llave Candidata</option>
                            <option name="2" value="2">AtributoNoPrimo</option>
                            <option name="3" value="3">NoPrimo</option>
                            <option name="4" value="4">Otro no primo</option>
                            <option name="5" value="5">Otro mas</option>
                            <option name="6" value="6">Foreign Key</option>
                            <option name="7" value="7">FK</option-->
                        </select>
                        <label>Esperando respuesta del servidor</label>
                    </div>
                    
                    <button id="add" class="btn right orange">Consultar Informaci&oacute;n</button>
                    
                </div>
    	    </div>
    	    <div class="row">
    	        <div id="data" class="col l10 offset-l1">
    	            
    	        </div>
    	    </div>
			
	</main>

	<footer class="page-footer grey darken-4">
		<?php include('code/footer.html'); ?>
    </footer>

</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Muebler&iacute;as Quetzal</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include('code/head.html'); ?>
	<link href="css/own.css" rel="stylesheet" type="text/css">
	<script src="js/vertical.js"></script>

</head>

<body>

	<header>
		<?php include('code/header.html'); ?>
	</header>

	<main>
	        <div class="container center"><h3>Fragmentaci&oacute;n Vertical</h3></div>
	        
<!-- THE LESS THE BETTER -->
<!-- VE LA OCUMENTACION PARA QUE SEA MAS SENCILLO-->
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
                        <h5>Atributos: <span class="grey-text"> Escoja los atributos para el fragmento</span></h5>
                    </div>
                    
                    <div>
                        
                        <select multiple="multiple" name="atributes[]" id="attributes">
                            <!--option selected name="0" value="0">PK</option>
                            <option name="1" value="1">Llave Candidata</option>
                            <option name="2" value="2">AtributoNoPrimo</option>
                            <option name="3" value="3">NoPrimo</option>
                            <option name="4" value="4">Otro no primo</option>
                            <option name="5" value="5">Otro mas</option>
                            <option name="6" value="6">Foreign Key</option>
                            <option name="7" value="7"></option-->
                        </select>
                        <label>Esperando respuesta del servidor</label>
                    </div>
                    
                    <button id="add" class="btn right orange">A&ntilde;adir</button>
                    
                </div>
    	    </div>
    	    
    	    <div class="row">
    	        <div class="col l1"></div>
    	        <div class="col l5">
                    <h5>Expresiones Algebraicas:</h5>
   
                        
                        <div id="fragmentos" class="collection">
                            <!--a id="F1" href="#" class="collection-item">F1: PI(PK,attr,attri)<i class="close material-icons">close</i></a>
                            <a id="F2" href="#" class="collection-item active">F2: PI(PK,attr,attri)<i class="close material-icons">close</i></a>
                            <a id="F3" href="#" class="collection-item">F3: PI(PK,attr,attri)<i class="close material-icons">close</i></a>
                            <a id="F4" href="#" class="collection-item">F4: PI(PK,attr,attri)<i class="close material-icons">close</i></a-->
                        </div>
            
                    
                    <button id="completeness" class="btn right">Validar Completitud</button>
                </div>
                <div class="col l5">
                    <h5>Colocar Fragmento:</h5>
                    <div class="row">
                        <h5 id="fragment" class="grey-text">P</h5>
                        
                        <ul id="sitios" class="dropdown-content">
                            <!-- WITH AJAX SHOULD LOAD -->
                            <li><a id="1">Sitio 1</a></li>
                            <li><a id="2">Sitio 2</a></li>
                            <li><a id="3">Sitio 3</a></li>
                        </ul>
                    
                        <a class="btn dropdown-button orange left-align" id="sitio" data-activates="sitios" style="min-width:160px">
                            Sitio 1<span class="glyphicon glyphicon-triangle-bottom s3"></span>
                        </a>
                        
                        <a id="colocar" class="btn right" data-id="" data-sitio="">Colocar</a>
                    </div>
                    
                    
                </div>
                    
    	    </div>
    	    
    	    <!--div class="container"><button class="btn right">Next</button></div-->
	</main>

	<footer class="page-footer grey darken-4">
		<?php include('code/footer.html'); ?>
    </footer>

</body>
</html>

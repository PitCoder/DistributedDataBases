$(document).ready(function() {

	$.ajax({
		method: "post",
		url: "php/gmodeloAcab.php",
		data: {id:123},
		success: function(json){
			$("#Acabados").html(json);
			establecerAcabados();
		},
		error: function(xhr, status, error) { alert('Server Error 2'); }
	});
	$.ajax({
		method: "post",
		url: "php/gmodeloCate.php",
		data: {id:123},
		success: function(json){
			$("#Categorias").html(json);
			establecerCategorias();
		},
		error: function(xhr, status, error) { alert('Server Error 2'); }
	});
	$.ajax({
		method: "post",
		url: "php/gmodeloMate.php",
		data: {id:123},
		success: function(json){
			$("#Materiales").html(json);
			establecerMatriales();
		},
		error: function(xhr, status, error) { alert('Server Error 2'); }
	});
	$('#formModelo').validetta({
		display: 'inline',
		errorTemplateClass : 'validetta-bubble',
		onValid : function(e){
			e.preventDefault();
			var modelo = document.getElementById("modelo").value;
			var nombre = document.getElementById("nombre").value;
			var precio = document.getElementById("precio").value;
			var descuento = document.getElementById("descuento").value;
			var alto = document.getElementById("alto").value;
			var ancho = document.getElementById("ancho").value;
			var prof = document.getElementById("prof").value;
			var desc = document.getElementById("desc").value;
			//alert("Modelo: "+modelo+" | Precio: "+precio+" | Nombre: "+nombre+" | Descuento: "+descuento+" | Alto: "+alto+" | Ancho: "+ancho+" | Profundidad: "+prof+" | Descripcion: "+desc);
			
			var acabados = [];
			var materiales = [];
			var categorias = [];
			
			acabados = seleccionados("data-acab");
			materiales = seleccionados("data-mate");
			categorias = seleccionados("data-cate");
			//imprimir(acabados);
			//imprimir(materiales);
			//imprimir(categorias);
			
			var JSON = {"modelo": modelo, "precio": precio, "nombre": nombre ,"descuento": descuento,
			"alto": alto, "ancho": ancho, "profundidad": prof, "descripcion" : desc, "acabados": acabados, "materiales" : materiales, "categorias":categorias};
			
			alert("Modelo: " +JSON['modelo']);
			alert("Precio: " +JSON['precio']);
			alert("Nombre: " +JSON['nombre']);
			alert("Descuento: "+ JSON['descuento']);
			alert("Alto: " +JSON['alto']);
			alert("Ancho: " +JSON['ancho']);
			alert("Profundidad: " +JSON['profundidad']);
			alert("Descripcion: "+ JSON['descripcion']);
			
			for(var i=0; i<JSON['acabados'].length;i++)
				{
					alert("Acabado "+(i+1)+" es "+JSON['acabados'][i]);
				}					
			for(var i=0; i<JSON['materiales'].length;i++)
				{
					alert("Material "+(i+1)+" es "+JSON['materiales'][i]);
				}
			for(var i=0; i<JSON['categorias'].length;i++)
				{
					alert("Categoria "+(i+1)+" es "+JSON['categorias'][i]);
				}
			if(precio<=0)
				{
					alert("Se que eres generoso, pero aquí no damos nada gratis");
				}
			if(descuento>100)
				{
					alert("Con ese descuento le está pagando al cliente para que se lleve tu mueble No mames :v");
				}
			else
				{
					$.ajax({
						method: "post",
						url: "php/gmodeloInsertModelo.php",
						data: JSON,
						success: function(resp){
							if(resp==0)
								{
									alert("Corrar por sus vidas");
								}
							else if(resp==1)
								{
									alert("Todo a salido a pedir de milhouse");
								}
							else
								{
									alert("Se mamo el joven");
								}
							//alert(resp);
						},
						error: function(xhr, status, error) { alert('Server Error 2'); }
					});
				}
				
		},
		onError : function( event ){}
	});
	function imprimir(arreglo)
		{
			for( var i =0; i<arreglo.length;i++)
				{
					alert(arreglo[i]);
				}
		}
	function seleccionados(atributo)
		{
			var resultados=[];
			var elementos=[];
			elementos = getAllElementsWithAttribute(atributo);
			for(var i=0; i<elementos.length;i++)
				{
					if(elementos[i].className=="collection-item active")
						{
							resultados.push($(elementos[i]).attr(atributo));
						}
				}
			return resultados;
		}
	
	//alert('Holap');
	/*
	$(".acab").on("click",function(){
		alert($(this).attr("data-acab"));
	});
	$(".mate").on("click",function(){
		alert($(this).attr("data-mate"));
	});
	$(".cate").on("click",function(){
		alert($(this).attr("data-cate"));
	});*/
	
	function saber()
		{
			if(this.className=="collection-item active")
				{
					this.className="collection-item"
				}
			else
				{
					this.className="collection-item active";
				}
		}
	function getAllElementsWithAttribute(attribute)
		{
			var matchingElements = [];
			var allElements = document.getElementsByTagName('*');
			for (var i = 0, n = allElements.length; i < n; i++)
				{
					if (allElements[i].getAttribute(attribute) !== null)
						{
							matchingElements.push(allElements[i]);
						}
				}
		  return matchingElements;
		}
	function establecerAcabados()
		{
			elementosDelForm = getAllElementsWithAttribute('data-acab');
			for(var i=0; i<elementosDelForm.length;i++) 
				{
					elementosDelForm[i].addEventListener("click", saber);
				}
		}
	function establecerCategorias()
		{
			elementosDelForm = getAllElementsWithAttribute('data-cate');
			for(var i=0; i<elementosDelForm.length;i++) 
				{
					elementosDelForm[i].addEventListener("click", saber);
				}
		}
	function establecerMatriales()
		{
			elementosDelForm = getAllElementsWithAttribute('data-mate');
			for(var i=0; i<elementosDelForm.length;i++) 
				{
					elementosDelForm[i].addEventListener("click",saber);
				}
		}
});
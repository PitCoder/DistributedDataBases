$(document).ready(function() {
	
	var modelo="XD";
	var cantidadTotalLote=0;
	var almacenesUsados= [];
	$("#Formulario").hide();
	$("#Cancelar").hide();
	$('#formLote').validetta({
	    display: 'inline',
	    errorTemplateClass : 'validetta-bubble',
            onValid : function(e){
                e.preventDefault();
				var parametros = {
					"modelo" : document.getElementById("modelo").value,
					"cantidad" : document.getElementById("cantidad").value
					};
				//alert(parametros["modelo"]);	
				//alert("["+parametros["cantidad"]+"]");
				
				$.ajax({
					method:"post",
					url:"php/modeloLote.php",
					data: parametros,
					success: function(resp){
						if(resp=="Nel")
							{
								alert("Ps Nel");
							}
						else
							{
								$("#almacenes").html(resp);
								modelo = parametros["modelo"];
								cantidadTotalLote = parametros["cantidad"];
								establecerAlmacenes();
								$("#Formulario").show();
								$("#Cancelar").show();
								$("#Confirmar").hide();
							}
					},
					error: function(err,or){
						alert("Server Error insertModelo");
					}
				});
			},
            onError : function( event ){}
    });
	//alert("Funciono");
	$("#Cancelar").click(function(){
		modelo="XD";
		cantidadTotalLote=0;
		almacenesUsados= [];
		despliegue(almacenesUsados);
		$("#Formulario").hide();
		document.getElementById("almacenSelec").value="Ninguno";
		document.getElementById("cantidadD").value=0;
		document.getElementById("cantidadA").value=0;
		document.getElementById("modelo").value="";
		document.getElementById("cantidad").value="";
		$("#Cancelar").hide();
		$("#Confirmar").show();
		
	});
	$('#formCantidad').validetta({
	    display: 'inline',
	    errorTemplateClass : 'validetta-bubble',
        onValid : function(e){
            e.preventDefault();
			var cantidadAAgregar = document.getElementById("cantidadA").value;
			var nombre = document.getElementById("almacenSelec").value;
			var cantMax = document.getElementById("cantidadD").value;
			//alert("JSON OK");
			//alert("cantMax > cantidadAAgregar |||"+cantMax+" => "+cantidadAAgregar );
			if(nombre=="Ninguno")
				{
					alert("Debe de seleccionar un almacén");
				}
			else
				{
					if((cantMax*1)+1>(cantidadAAgregar*1))
						{
							if(noExcede(cantidadAAgregar, nombre))
								{
									if(existe(nombre))
										{
											alert("El almacén: "+nombre+" ya había sido agregado");
											//imprimirArreglo();
										}
									else
										{
											alert("El almacén: "+nombre+" se ha agregado");
											var JSON = {"nombre":nombre, "agregar": cantidadAAgregar };
											almacenesUsados.push(JSON);
											//imprimirArreglo();
										}
									despliegue(almacenesUsados);
								}
							else
								{
									alert("La suma de las cantidades que ha ingresado excede la capcacidad del Lote");
								}
						}
					else 
						{
							alert("La cantidad que ha ingresado excede la capcacidad del almacen");
						}

				}
		},
        onError : function( event ){}
    });
	$("#Terminar").click( function(){
		var elementos = {"modelo":modelo, "almacenes":almacenesUsados, "cantidad":cantidadTotalLote};
		//alert(elementos['almacenes'][2]['nombre']);
		var total=0;
		total=contar()
		if(total<cantidadTotalLote)
			{
				alert("Aun no terminas de especificar donde se guardará cada parte del Lote");
			}
		else if(total==cantidadTotalLote)
			{
				$.ajax({
					method:"post",
					url:"php/guardarLote.php",
					data: elementos,
					success: function(resp){
						if(resp=="Nel")
							{
								alert("Ps Nel");
							}
						else
							{
								//alert(resp);
								alert("Todo a salido a pedir de milhouse");
							}
					},
					error: function(err,or){
						alert("Server Error insertModelo");
					}
				});
		
			}
		else
			{
				alert("No sé como vergas le hiciste pero has revasado la cantidad máxima establecida");
			}
	});
	function contar()
		{
			var c=0;
			for (var i=0;i<almacenesUsados.length;i++)
				{
					c=c*1+almacenesUsados[i]['agregar']*1;
				}
			return c;
		}
	$("#Borrar").click( function(){
		var nombre = document.getElementById("almacenSelec").value;
		var entro=0;
		//imprimirArreglo();
		for( var i=0; i < almacenesUsados.length;i++)
			{
				if(nombre==almacenesUsados[i]['nombre'])
					{
						almacenesUsados.splice(i, 1);
						entro=1;
					}
			}
		if(entro==0)
			{
				alert("No se puede eliminar un registro que no existe >:v");
			}
		else
			{
				alert("Eliminado >::v");
			}
		//imprimirArreglo();
	});
	function imprimirArreglo()
		{
			for( var i=0; i < almacenesUsados.length;i++)
				{
					alert("Almacen : "+almacenesUsados[i]['nombre']+" | "+"cantidad : "+almacenesUsados[i]['agregar']);
				}
		}
	
	function noExcede(cantidadNueva,nombre)
		{
			var cantidadActual=0;
			var entro=0;
			for( var i=0; i < almacenesUsados.length;i++)
				{
					if(nombre==almacenesUsados[i]['nombre'])
						{
							cantidadActual=cantidadActual+cantidadNueva*1;
							entro=1;
							almacenesUsados[i]['agregar']=cantidadNueva;
						}
					else
						{
							cantidadActual=cantidadActual+almacenesUsados[i]['agregar']*1;
						}
				}
			if(entro==0)
				{
					cantidadActual=cantidadActual+cantidadNueva*1;
				}
			//alert("cantidadActual < cantidadTotalLote |"+cantidadActual+" < "+cantidadTotalLote );
			if(cantidadActual>cantidadTotalLote)
				{
					return false;
				}
			else
				{
					return true;
				}					
		}
	function existe(nombre)
		{
			for( var i=0; i < almacenesUsados.length;i++)
				{
					if(nombre==almacenesUsados[i]['nombre'])
						{
							return true;
						}
				}
			return false;
		}
	function buscarAlmacen()
		{
			var almacen = { "almacen" : $(this).attr("data-almacen")};
			//alert(almacen["almacen"]);
			$.ajax({
				method:"post",
				url:"php/cantAlmacenLote.php",
				data: almacen,
				success: function(resp){
					if(resp=="Nel")
						{
							alert("Ps Nel");
						}
					else
						{
							document.getElementById("cantidadD").value=resp;
							document.getElementById("almacenSelec").value=almacen["almacen"];
						}
				},
				error: function(err,or){
					alert("Server Error insertModelo");
				}
			});
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
	function establecerAlmacenes()
		{
			elementosDelForm = getAllElementsWithAttribute('data-almacen');
			for(var i=0; i<elementosDelForm.length;i++) 
				{
					elementosDelForm[i].addEventListener("click", buscarAlmacen);
				}
		}
});
	function despliegue(almacenes)
		{
			var info="";
			for (var i=0; i<almacenes.length;i++)
				{
					info+="<div class='card row col l12'><div class='col l6'>"+almacenes[i]['nombre']+"</div><div class='col l6' align='center'>"+almacenes[i]['agregar']+"</div></div>";
				}
			$("#seleccionados").html(info);
		}
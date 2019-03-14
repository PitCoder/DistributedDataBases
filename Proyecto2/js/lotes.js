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
				if(parametros['cantidad']*1>0)
					{
						$.ajax({
							method:"post",
							url:"php/modeloLote.php",
							data: parametros,
							success: function(resp){
								if(resp==0)
									{
										$.confirm({
											title: 'Error!',
											content: 'El modelo ingresado no existe! D:',
											type: 'red',
											closeIcon: true,
											columnClass: 'medium',
											typeAnimated: true,
											buttons:{
												Nice:{
												text: 'Ok!',
													btnClass: 'btn-black',
												action: function(){
													}
												}}
										});
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
								$.confirm({
									title: 'Error!',
									content: 'Lo sentimos, lo trataremos de arreglar lo mas pronto posible',
									type: 'red',
									closeIcon: true,
									columnClass: 'medium',
									typeAnimated: true,
									buttons:{
										Nice:{
										text: 'Ok!',
											btnClass: 'btn-black',
										action: function(){
											}
										}}
								});
							}
						});
					}
				else
					{
						$.confirm({
							title: 'Error!',
							content: 'La cantidad a ingresar debe ser 1 o mayor',
							type: 'orange',
							closeIcon: true,
							columnClass: 'medium',
							typeAnimated: true,
							buttons:{
								Nice:{
								text: 'Ok!',
									btnClass: 'btn-blue',
								action: function(){
									}
								}}
						});
					}
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
					$.confirm({
						title: 'Sin alamcén!',
						content: 'Seleccione un almacén',
						type: 'black',
						closeIcon: true,
						columnClass: 'medium',
						typeAnimated: true,
						buttons:{
							Nice:{
							text: 'Ok!',
								btnClass: 'btn-blue',
							action: function(){
								}
							}}
					});
				}
			else if(cantidadAAgregar==0)
				{
					$.confirm({
						title: 'Error!',
						content: 'La cantidad a ingresar debe ser 1 o mayor',
						type: 'orange',
						closeIcon: true,
						columnClass: 'medium',
						typeAnimated: true,
						buttons:{
							Nice:{
							text: 'Ok!',
								btnClass: 'btn-blue',
							action: function(){
								}
							}}
					});
				}
			else
				{
					if((cantMax*1)+1>(cantidadAAgregar*1))
						{
							if(noExcede(cantidadAAgregar, nombre))
								{
									if(existe(nombre))
										{
											$.confirm({
												title: 'Almacén actualizado!',
												content: 'El nuevo valor a ingresar al almacen ha sido actualizado',
												type: 'blue',
												closeIcon: true,
												columnClass: 'medium',
												typeAnimated: true,
												buttons:{
													Nice:{
													text: 'Ok!',
														btnClass: 'btn-blue',
													action: function(){
														}
													}}
											});
											//imprimirArreglo();
										}
									else
										{
											$.confirm({
												title: 'Almacén agregado!',
												content: 'Se ha agregado el almacén y la cantidad que guardará',
												type: 'green',
												closeIcon: true,
												columnClass: 'medium',
												typeAnimated: true,
												buttons:{
													Nice:{
													text: 'Ok!',
														btnClass: 'btn-green',
													action: function(){
														}
													}}
											});
											var JSON = {"nombre":nombre, "agregar": cantidadAAgregar };
											almacenesUsados.push(JSON);
											//imprimirArreglo();
										}
									despliegue(almacenesUsados);
								}
							else
								{
									$.confirm({
										title: 'Error en la cantidad del Lote!',
										content: 'El valor que ingresó sobrepsaría la cantidad máxima del Lote',
										type: 'red',
										closeIcon: true,
										columnClass: 'medium',
										typeAnimated: true,
										buttons:{
											Nice:{
											text: 'Ok!',
												btnClass: 'btn-black',
											action: function(){
												}
											}}
									});
								}
						}
					else 
						{
							$.confirm({
								title: 'No se pudo agregar!',
								content: 'El valor a ingresar al almacén excede la capacidad del mismo',
								type: 'red',
								closeIcon: true,
								columnClass: 'medium',
								typeAnimated: true,
								buttons:{
									Nice:{
									text: 'Ok!',
										btnClass: 'btn-blue',
									action: function(){
										}
									}}
							});
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
				$.confirm({
					title: 'Error!',
					content: 'Aún no terminas de asignar todo el lote',
					type: 'red',
					closeIcon: true,
					columnClass: 'medium',
					typeAnimated: true,
					buttons:{
						Nice:{
						text: 'Ok!',
							btnClass: 'btn-black',
						action: function(){
							}
						}}
				}); 
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
								$.confirm({
									title: 'Error!',
									content: 'Lo sentimos, lo trataremos de arreglar lo mas pronto posible',
									type: 'red',
									closeIcon: true,
									columnClass: 'medium',
									typeAnimated: true,
									buttons:{
										Nice:{
										text: 'Ok!',
											btnClass: 'btn-black',
										action: function(){
											}
										}}
								}); 
							}
						else
							{
								//alert(resp);
								//alert("Todo a salido a pedir de milhouse");
								$.confirm({
									title: 'Lote generado con éxito!',
									content: 'El Lote se ha creado con éxito, y los valores indicados fueron guardados en los almacenes correspondientes',
									type: 'green',
									closeIcon: true,
									columnClass: 'medium',
									typeAnimated: true,
									buttons:{
										Nice:{
										text: 'Ok!',
											btnClass: 'btn-white',
										action: function(){
											}
										}}
								});
							}
					},
					error: function(err,or){
						alert("Server Error insertModelo");
					}
				});
		
			}
		else
			{
				$.confirm({
					title: 'Error!',
					content: 'Lo sentimos, lo trataremos de arreglar lo mas pronto posible',
					type: 'red',
					closeIcon: true,
					columnClass: 'medium',
					typeAnimated: true,
					buttons:{
						Nice:{
						text: 'Ok!',
							btnClass: 'btn-black',
						action: function(){
							}
						}}
				}); 
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
				$.confirm({
					title: 'Error!',
					content: 'Este almacén no contenía nada',
					type: 'red',
					closeIcon: true,
					columnClass: 'medium',
					typeAnimated: true,
					buttons:{
						Nice:{
						text: 'Ok!',
							btnClass: 'btn-black',
						action: function(){
							}
						}}
				}); 
			}
		else
			{
				$.confirm({
					title: 'Eliminado!',
					content: 'Las existencias a agregar a dicho almacén, se han eliminado',
					type: 'white',
					closeIcon: true,
					columnClass: 'medium',
					typeAnimated: true,
					buttons:{
						Nice:{
						text: 'Ok!',
							btnClass: 'btn-black',
						action: function(){
							}
						}}
				});
				despliegue(almacenesUsados);
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
							$.confirm({
								title: 'Error!',
								content: 'Lo sentimos, lo trataremos de arreglar lo mas pronto posible',
								type: 'red',
								closeIcon: true,
								columnClass: 'medium',
								typeAnimated: true,
								buttons:{
									Nice:{
									text: 'Ok!',
										btnClass: 'btn-black',
									action: function(){
										}
									}}
							}); 
						}
					else
						{
							document.getElementById("cantidadD").value=resp;
							document.getElementById("almacenSelec").value=almacen["almacen"];
						}
				},
				error: function(err,or){
					$.confirm({
						title: 'Error!',
						content: 'Lo sentimos, lo trataremos de arreglar lo mas pronto posible',
						type: 'red',
						closeIcon: true,
						columnClass: 'medium',
						typeAnimated: true,
						buttons:{
							Nice:{
							text: 'Ok!',
								btnClass: 'btn-black',
							action: function(){
								}
							}}
					}); 
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
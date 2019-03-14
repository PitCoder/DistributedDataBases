$(document).ready(function() {
	$("#proceso").hide();
	$("#imagenEspera1").hide();
	$("#imagenEspera2").hide();
	var dataIndice = 0;
	var Indice=0;
	$("#Next").click( function(){
		//alert("Siguientes en marcha");
		if(Indice+8 < dataIndice)
			{
				Indice = Indice +8;
			}
		actualizarCatalogo();
		//$('html, body').animate({ scrollTop: 0 }, 'slow');
	});
	$("#Prev").click( function(){
		//alert("Anteriores en marcha");
		if(Indice-8 >= 0)
			{
				Indice = Indice -8;
			}
		actualizarCatalogo();
		//$('html, body').animate({ scrollTop: 0 }, 'slow');
	});
	$("#Terminar").click( function(){
		//alert("Terminar en marcha");
		var parametros = {'proceso':'proceso'};
		$.ajax({
			method:"post",
			url:"php/agregarMTerminar.php",
			data: parametros,
			success: function(resp){
				$("#AuxiliarPruebas").html(resp);
				$.confirm({
					title: 'Utilería actualizada!',
					content: 'Los muebles se han modificado',
					type: 'blue',
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
				document.getElementById("id_obra").value = "";
				$("#proceso").hide();
				$("#Agregados").html("");
				$("#inicio").show();
			},
			error: function(err,or){
				$("#imagenEspera1").hide();
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
		
	});
	$("#Cancelar").click( function(){
		document.getElementById("id_obra").value = "";
		$("#proceso").hide();
		$("#Agregados").html("");
		$("#inicio").show();
		
	});
	function actualizarCatalogo()
		{
			$(".Mueble").hide();
			dataIndice=0;
			var todosLosMuebles = getAllElementsWithAttribute("data-visible");
			for(var i=0; i<todosLosMuebles.length; i++)
				{
					if(todosLosMuebles[i].getAttribute("data-visible")=="V")
						{
							todosLosMuebles[i].setAttribute("id",""+dataIndice);
							//$("#"+dataIndice).show();
							if(dataIndice >= Indice && dataIndice< Indice+8)
								{
									$("#"+dataIndice).show();
								}
							//alert("Existe uno que debería estar visible");
							dataIndice=dataIndice+1;
						}
					else
						{
							todosLosMuebles[i].setAttribute("id",""+100000);
						}
				}
		}
	$('#formObra').validetta({
	    display: 'inline',
	    errorTemplateClass : 'validetta-bubble',
            onValid : function(e){
                e.preventDefault();
				var parametros = {
					"id_obra" : document.getElementById("id_obra").value,
					};
				$("#imagenEspera1").show();
				$.ajax({
					method:"post",
					url:"php/agregarMBuscarObra.php",
					data: parametros,
					success: function(resp){
						if(resp==0)
							{
								$("#imagenEspera1").hide();
								$.confirm({
									title: 'Error!',
									content: 'La obra ingresada no existe! D:',
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
								$.ajax({
									method:"post",
									url:"php/agregarMSelectMuebles.php",
									data: parametros,
									success: function(resp){
										$("#imagenEspera1").hide();
										$("#Muebles").html(resp);
										$.ajax({
											method:"post",
											url:"php/agregarMSaberMueblesObra.php",
											data: parametros,
											success: function(resp){
												actualizarCatalogo();
												$("#proceso").show();
												$("#inicio").hide();
												$("#Agregados").html(resp);
												
												
											},
											error: function(err,or){
												$("#imagenEspera1").hide();
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
										establecerBotones();
											
									},
									error: function(err,or){
										$("#imagenEspera1").hide();
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
					},
					error: function(err,or){
						$("#imagenEspera1").hide();
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
				
				
			},
        onError : function( event ){}
    });
	
	function imprimirArreglo()
		{
			for( var i=0; i < almacenesUsados.length;i++)
				{
					alert("Almacen : "+almacenesUsados[i]['nombre']+" | "+"cantidad : "+almacenesUsados[i]['agregar']);
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
	function quitarMueble()
		{
			var modelo = this.getAttribute('data-elim-modelo');
			var nombre = this.getAttribute('data-nombre');
			$("#imagenEspera2").show();			
			actualizarLista(modelo,nombre,"quitar");	
		}
	function agregarMueble()
		{
			var modelo = this.getAttribute('data-modelo');
			var nombre = this.getAttribute('data-nombre');
			$("#imagenEspera2").show();			
			actualizarLista(modelo,nombre,"agregar");
		}
	function actualizarLista(modelo,nombre,tipo)
		{
			
			var JSON = {"modelo": modelo,"nombre":nombre, "tipo":tipo};
			$.ajax({
				method:"post",
				url:"php/agregarMActualizarUtileria.php",
				data: JSON,
				success: function(resp){
					if(resp==0)
						{
							$("#imagenEspera2").hide();
							$.confirm({
								title: 'Error!',
								content: 'Ya no quedan existncias del mueble',
								type: 'yellow',
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
					else if(resp==1)
						{
							$("#imagenEspera2").hide();
							$.confirm({
								title: 'Error!',
								content: 'No se puede quiat algo que no existe',
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
					else if(resp==3)
						{
							$("#imagenEspera2").hide();
							$("#Agregados").html("");
						}
					else
						{	
							$("#imagenEspera2").hide();
							$("#Agregados").html(resp);
							//$("#Agregados").show();
						}
						
				},
				error: function(err,or){
					$("#imagenEspera2").hide();
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
	function establecerBotones()
		{
			elementosDelForm = getAllElementsWithAttribute('data-modelo');
			for(var i=0; i<elementosDelForm.length;i++) 
				{
					elementosDelForm[i].addEventListener("click", agregarMueble);
				}
			elementosDelForm = getAllElementsWithAttribute('data-elim-modelo');
			for(var i=0; i<elementosDelForm.length;i++) 
				{
					elementosDelForm[i].addEventListener("click", quitarMueble);
				}
		}
	
	function despliegue(almacenes)
		{
			var info="";
			for (var i=0; i<almacenes.length;i++)
				{
					//info+="<div class='card row col l12'><div class='col l6'>"+almacenes[i]['nombre']+"</div><div class='col l6' align='center'>"+almacenes[i]['agregar']+"</div></div>";
				}
			$("#Agregados").html(info);
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
});

$(document).ready(function() {
	
	$.ajax({
		method:"post",
		url:"php/ordenesSaberOrden.php",
		data: {'algo':'algo'},
		success: function(resp){
			$("#Eventos").html(resp);
			establecerBotonesDevolver();
			establecerBotonesCancelar();
			establecerBotonesConfirmar();
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
	function cancelar()
		{
			var evento = $(this).attr("data-cancelar");
			$.ajax({
				method:"post",
				url:"php/ordenesEliminarAktuar.php",
				data: {'obra':evento},
				success: function(resp){
					//alert(resp);
					parametros = {'operaciones': JSON.parse(resp)}
					$.ajax({
						method:"post",
						url:"php/ordenesEliminarQuetzal.php",
						data: parametros,
						success: function(resp2){
							$.confirm({
								title: 'Orden cancelada!',
								content: 'La orden ha sido cancelada con éxito!',
								type: 'dark',
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
			location.href="ordenesDt.php"
		}
	function devolver()
		{
			var evento = $(this).attr("data-devolver");
			$.ajax({
				method:"post",
				url:"php/ordenesDevolverSaberOperaciones.php",
				data: {'obra':evento},
				success: function(operaciones){
					//alert(operaciones);
					$.ajax({
						method:"post",
						url:"php/ordenesDevolverQuetzal.php",
						data: {'operaciones':JSON.parse(operaciones)},
						success: function(resp1){
							//alert(resp1);
							$.ajax({
								method:"post",
								url:"php/ordenesDevolverAktuar.php",
								data: {'operacionesN':JSON.parse(resp1),'operacionesA':JSON.parse(operaciones)},
								success: function(resp2){
									$.confirm({
										title: 'Listo!',
										content: 'La devolución de los muebles se ha iniciado',
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
	function confirmar()
		{
			var evento = $(this).attr("data-confirmar");
			$.ajax({
				method:"post",
				url:"php/ordenesConfirmarLlegada.php",
				data: {'obra':evento},
				success: function(resp){
					$.confirm({
						title: 'Listo!',
						content: 'Se ha confirmado la obtención del pedido',
						type: 'green',
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
	function establecerBotonesDevolver()
		{
			botones = getAllElementsWithAttribute("data-devolver");
			for(var i=0; i<botones.length;i++) 
				{
					botones[i].addEventListener("click", devolver);
				}
		}
	function establecerBotonesCancelar()
		{
			botones = getAllElementsWithAttribute("data-cancelar");
			for(var i=0; i<botones.length;i++) 
				{
					botones[i].addEventListener("click", cancelar);
				}
		}
	function establecerBotonesConfirmar()
		{
			botones = getAllElementsWithAttribute("data-confirmar");
			for(var i=0; i<botones.length;i++) 
				{
					botones[i].addEventListener("click", confirmar);
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
});

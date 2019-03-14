$(document).ready(function() {
	$("#proceso").hide();
	
	$("#Cancelar").click( function(){
		document.getElementById("id_obra").value = "";
		$("#proceso").hide();
		$("#inicio").show();
		document.getElementById("ObraAux").value = "";
		
	});
	
	$('#formOrden').validetta({
	    display: 'inline',
	    errorTemplateClass : 'validetta-bubble',
            onValid : function(e){
                e.preventDefault();
				if(document.getElementById("Estado").getAttribute("data-valido")=="Si")
					{
						var parametros = {
							"id_obra" : document.getElementById("id_obra").value,
							};
						$.ajax({
							method:"post",
							url:"php/ordenComprobarCrear.php",
							data: parametros,
							success: function(resp){
								//alert(resp);
								if(resp==0)
									{
										$.confirm({
											title: 'Error en fechas!',
											content: 'El día de la obra no es válido, no cumple el margen de envío (debe haber 3 días de margen) o el día ya pasó',
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
								else if(resp==1)
									{
										$.confirm({
											title: 'Error en fechas!',
											content: 'El mes de la obra es menor al mes actual ',
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
								else if(resp==2)
									{
										$.confirm({
											title: 'Error en fechas!',
											content: 'El año de la obra es menor al año actual',
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
										
										var parametros2 = {
											"idObra" : document.getElementById("ObraAux").value,
											"guardar": JSON.parse(resp)
											};
										//alert(parametros2);
										$.ajax({
											method:"post",
											url:"php/ordenesGuardarOrden.php",
											data: parametros2,
											success: function(resp2){
												//alert(resp2);
												document.getElementById("id_obra").value = "";
												$("#proceso").hide();
												$("#inicio").show();
												document.getElementById("ObraAux").value = "";
												$.confirm({
													title: 'Datos actualizados con éxito!',
													content: 'La orden a sido procesada exitosamente',
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
							content: 'Las existencias de los muebles no cumplen para la realización del pedido',
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
			},
        onError : function( event ){}
    });
	$('#formObra').validetta({
	    display: 'inline',
	    errorTemplateClass : 'validetta-bubble',
            onValid : function(e){
                e.preventDefault();
				var parametros = {
					"id_obra" : document.getElementById("id_obra").value,
					};
				$.ajax({
					method:"post",
					url:"php/agregarMBuscarObra.php",
					data: parametros,
					success: function(resp){
						if(resp==0)
							{
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
								//alert("Holap");
								$.ajax({
									method:"post",
									url:"php/ordenesObraExistencias.php",
									data: parametros,
									success: function(resp){
										if(resp==1)
											{
												$.confirm({
													title: 'Error!',
													content: 'El mes de la obra no es válido',
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
										else if( resp == 0)
											{
												$.confirm({
													title: 'Error!',
													content: 'El día de la obra no es válido (Recuerde que debe haber un margen de 3 días para hacer el envio',
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
										else if( resp == 2)
											{
												$.confirm({
													title: 'Error!',
													content: 'El año de la obra no es válido',
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
												$("#InfoObra").html(resp);
												$("#proceso").show();
												$("#inicio").hide();
												document.getElementById("ObraAux").value = parametros['id_obra'];
											}
										//alert(resp);
											
									},
									error: function(err,or){
										
										$.confirm({
											title: 'Error de conexión!',
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
	


	
});

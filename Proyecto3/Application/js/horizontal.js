$(document).ready(function(){
//        document.getElementById('cuenta').className = 'active';
	var rel = "Ninguna";	//Relacion
	var selecAtributo = "Ninguna"; //atributo
	
	$(document).ready(function() {
		$('select').material_select();
	});
	
	$.ajax({
		method:"post",
		url:"php/horizontal1.php",
		data: {},
		success: function(resp){
			$("#relaciones").html(resp);
			$("#dropdown2").html(resp);
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
	
	function atributes($relacion){
		rel = $relacion;
		selecAtributo = "Ninguna";
		$.ajax({
			method:"post",
			url:"php/horizontal2.php",
			data: {data : $relacion},
			success: function(resp){
				$("#attributes").html(resp);
				//$("#dropdown2").html(resp);
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
	
	$("#dropdown2").on("click","li",function(){
		atributes($(this).text());
		$('#filtro').html($(this).text()+'<span class="glyphicon glyphicon-triangle-bottom s3"></span>');
	});
	
	$("#relaciones").on("click","li",function(){
		$('#choice').html($(this).text()+'<span class="glyphicon glyphicon-triangle-bottom s3"></span>');
	});
	
	/*$(".chip").click(function(){
		$('.chip').attr("class",'chip');
		$(this).attr("class",'chip orange');
	});*/
	
	$("#attributes").on("click",".chip",function(){
		$('.chip').attr("class",'chip');
		$(this).attr("class",'chip orange');
		$('#atributo').html($(this).text());
		selecAtributo = ""+$(this).text();
	});
	
   $("#Fragmentar").click(function(){
		
		$.ajax({
				method:"post",
				url:"php/crearFragmentacion.php",
				data: {'1' : 0},
				success: function(resp){
	            	if(resp==-2)
						{
							$.confirm({
								title: 'Error!, pocos predicados',
								content: 'Hay muy pocos predicados simples, asegurece de declarar por lo menos 2',
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
					else if(resp==-1)
						{
							$.confirm({
								title: 'Error!, pocos predicados por relación',
								content: 'Para fragmentar una relación se necesitan por lo menos 2 predicados simples de esa relación',
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
					else if(resp==0)
						{
							$.confirm({
								title: 'Error!, no se cumple completitud',
								content: 'Hay una o más relaciones que no pueden tener una fragmentación completa con los predicados simples establecidos',
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
					else
						{
							$('#fragMin').html(resp);
							establecerBotonesSitios();
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
	});
   
   
	$("#agregar").click(function(){
		//alert("Holap");
		var x = document.querySelectorAll("li.active span");
		if(rel=="Ninguna")
			{
				$.confirm({
					title: 'Error relación desconocida!',
					content: 'Primero debe seleccionar una relación',
					type: 'red',
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
		else if(selecAtributo=="Ninguna")
			{
				$.confirm({
					title: 'Error atributo desconocido!',
					content: 'Después de seleccionar la relación, indique que atributo desea',
					type: 'red',
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
		else if(x.length==0)
			{
				$.confirm({
					title: 'Error operador desconocido!',
					content: 'Primero debe seleccionar un operador',
					type: 'red',
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
		else
			{
				var atributo = document.getElementById("atributo").textContent;
				var operador = x[0].innerHTML;
				var valor = document.getElementById("c").value;
				if(operador=="&gt;")
					operador = ">";
				else if(operador=="&lt;")
					operador = "<";
				else if(operador=="&gt;=")
					operador = ">=";
				else if(operador=="&lt;=")
					operador = "<=";
				//alert(operador);
				var data = {'rel':rel, 'atributo': atributo, 'operador':operador, 'valor': valor};
				
				$.ajax({
					method:"post",
					url:"php/insertarPredicadoS.php",
					data: data,
					success: function(resp){
				    	//alert(resp);
						if(resp==1)
							{
								saberPredicadosSimples();
							}
						else
							{
								$.confirm({
									title: 'Warning!',
									content: 'El predicado simple que ingresó ya existe',
									type: 'yellow',
									closeIcon: true,
									columnClass: 'medium',
									typeAnimated: true,
									buttons:{
										Nice:{
										text: 'Ok!',
											btnClass: 'btn-orange',
										action: function(){
											}
										}}
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
	});
		
	function saberPredicadosSimples()
		{
			$.ajax({
				method:"post",
				url:"php/saberPredicadosS.php",
				data: {'1' : 0},
				success: function(resp){
					$("#predicados").html(resp);
					establecerBotones();
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
	
	function quitarPred()
		{
			var eliminar = $(this).attr("data-pred");
			$.ajax({
				method:"post",
				url:"php/quitarPredicadoS.php",
				data: {'eliminar' : eliminar},
				success: function(resp){
					//alert(resp);
					if(resp==1)
						{
							saberPredicadosSimples();
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
	
	function colocarFragmento()
		{
			var sitio = $(this).attr("data-sitio");
			var idFrag = $(this).attr("data-frag");
			//alert("Sitio: "+sitio+", idFrag: "+idFrag);
			$.ajax({
				method:"post",
				url:"php/colocarFragmento.php",
				data: {'id':idFrag,'sitio':sitio},
				success: function(resp){
					if(resp==1)
					    {
					        $.confirm({
        						title: 'Éxito!',
        						content: "El fragmento especificado se ha guardado correctamente",
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
					    }
					else
					    {
					        $.confirm({
        						title: 'Error de novato!',
        						content: "Lo sentimos, trataremos de arreglarlo lo más pronto posible",
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
	
	function establecerBotones()
		{
			botones = getAllElementsWithAttribute("data-pred");
			for(var i=0; i<botones.length;i++) 
				{
					botones[i].addEventListener("click", quitarPred);
				}
		}
	
	function establecerBotonesSitios()
		{
			botones = getAllElementsWithAttribute("data-sitio");
			for(var i=0; i<botones.length;i++) 
				{
					botones[i].addEventListener("click", colocarFragmento);
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


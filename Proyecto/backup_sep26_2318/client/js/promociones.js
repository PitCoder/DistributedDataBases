$(document).ready(function(){
	var Indice = 0;
	var dataIndice = 0;
	$.ajax({
		method: "post",
		url: "php/promocionesSelect.php",
		data: {id:123},
		success: function(json){
			$("#modelos").html(json);
			establecerBotones();
			actualizar();
		},
		error: function(xhr, status, error) { alert('errorOnGetOrdenes'); }
	});
	document.getElementById("promo").className = "active";
	$("#Next").click( function(){
		//alert("Siguientes en marcha");
		if(Indice+4 < dataIndice)
			{
				Indice = Indice +4;
			}
		actualizar();
	});
	$("#Prev").click( function(){
		//alert("Anteriores en marcha");
		if(Indice-4 >= 0)
			{
				Indice = Indice -4;
			}
		actualizar();
	});	
	
function actualizar()
{
	var todosLosMuebles = getAllElementsWithAttribute("data-visible");
	dataIndice = todosLosMuebles.length; 
	for(var i=0; i<todosLosMuebles.length; i++)
		{
			if(i >= Indice && i< Indice+4)
				{
					$("#"+i).show();
				}
			else
				{
					$("#"+i).hide();
				}
		}
}

var botones =0;
function establecerBotones()
{
	botones = getAllElementsWithAttribute("data-modelo");
 	for(var i=0; i<botones.length;i++) 
		{
			botones[i].addEventListener("click", agregarACarro);
		}
}
function agregarACarro()
{
	 	var model = $(this).attr("data-modelo");
		$.ajax({
			method: "post",
			url: "php/agregarMuebleAlCarro.php",
			data: {Modelo:model},
			success: function(json){
                 $.confirm({
    			title: 'Mueble agregado!',
    			content: 'Su mueble ha sido agregado correctamente a su carro de compras',
    			type: 'green',
    			closeIcon: true,
    			columnClass: 'medium',
    			typeAnimated: true,
    				buttons: {
        				Nice: {
						text: 'Entendido',
	    				btnClass: 'btn-green',
	            		action: function(){
            				}
        				}
        			}
				});

			},
			error: function(xhr, status, error) { alert('errorOnGetOrdenes'); }
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
});

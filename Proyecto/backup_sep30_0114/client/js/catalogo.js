$(document).ready(function(){
	var Indice = 0;
	var dataIndice = 0;
	$.ajax({
		method: "post",
		url: "php/catSelect.php",
		data: {id:123},
		success: function(json){
			$("#modelos").html(json);
			establecerBotones();
		},
		error: function(xhr, status, error) { alert('Server Error 1'); }
	});
	$.ajax({
		method: "post",
		url: "php/catAcabSelect.php",
		data: {id:123},
		success: function(json){
			$("#Acabados").html(json);
			establecerCheckbox();
		},
		error: function(xhr, status, error) { alert('Server Error 2'); }
	});
	$("#H").click( function(){
		document.getElementById("H").className = "collection-item active";
		document.getElementById("O").className = "collection-item";
		document.getElementById("T").className = "collection-item";
		resetCatalogo();
	});
	$("#O").click( function(){
		document.getElementById("H").className = "collection-item";
		document.getElementById("O").className = "collection-item active";
		document.getElementById("T").className = "collection-item";
		resetCatalogo();
	});
	$("#T").click( function(){
		document.getElementById("H").className = "collection-item";
		document.getElementById("O").className = "collection-item";
		document.getElementById("T").className = "collection-item active";
		resetCatalogo();
	});
	
	$("#Next").click( function(){
		//alert("Siguientes en marcha");
		if(Indice+8 < dataIndice)
			{
				Indice = Indice +8;
			}
		actualizarCatalogo();
		$('html, body').animate({ scrollTop: 0 }, 'slow');
	});
	$("#Prev").click( function(){
		//alert("Anteriores en marcha");
		if(Indice-8 >= 0)
			{
				Indice = Indice -8;
			}
		actualizarCatalogo();
		$('html, body').animate({ scrollTop: 0 }, 'slow');
	});
	
var elementosDelForm =0;
var botones=0;

function establecerCheckbox()
{
	elementosDelForm = document.getElementsByTagName('input');
 	for(var i=0; i<elementosDelForm.length;i++) 
		{
			 if (elementosDelForm[i].type == 'checkbox') 
				{
					elementosDelForm[i].addEventListener("click", resetCatalogo);
				}
		}
}
function resetCatalogo()
{
	Indice=0;
	actualizarCatalogo();
}
function actualizarCatalogo() 
{
	$(".data-Hogar").hide();
	$(".data-Oficina").hide();
	var MH =document.getElementsByClassName("data-Hogar"); 
	var MO =document.getElementsByClassName("data-Oficina");
	for(var i=0; i<MH.length;i++)
		{
			MH[i].setAttribute("data-visible","F");
		}
	for(var i=0; i<MO.length;i++)
		{
			MO[i].setAttribute("data-visible","F");
		}
	var que = document.getElementsByClassName("collection-item active");
	//alert(que);
	var identificador = que[0].id;
	var quienes = ["X"];
	//alert(identificador);
	//alert(elementosDelForm.length);
	for(var i=0; i<elementosDelForm.length;i++) 
		{
			 if (elementosDelForm[i].type == 'checkbox') 
				{
					if(elementosDelForm[i].checked==true)
						{
							//alert(elementosDelForm[i].id);
							quienes.push(elementosDelForm[i].id);
							//alert(quienes);
						}
				}
		}
	for(var i=0; i<quienes.length;i++) 
		{
			var aMostrar = document.getElementsByClassName(quienes[i]);
			for(var j=0; j<aMostrar.length; j++)
				{
					aMostrar[j].setAttribute("data-visible","V");
				}
		}
	if(identificador=="H")
		{
			$(".data-Oficina").hide();
			for(var i=0; i<MO.length;i++)
				{
					MO[i].setAttribute("data-visible","F");
				}
		}
	else if(identificador=="O")
		{
			$(".data-Hogar").hide();
			for(var i=0; i<MH.length;i++)
				{
					MH[i].setAttribute("data-visible","F");
				}
		}
	var todosLosMuebles = getAllElementsWithAttribute("data-visible");
	dataIndice=0;
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
	//alert(identificador);
}

function establecerBotones()
{
	botones = getAllElementsWithAttribute("data-modelo");
 	for(var i=0; i<botones.length;i++) 
		{
			botones[i].addEventListener("click", agregarACarro);
		}
//	actualizarCatalogo();
}
function agregarACarro()
{
	var model = $(this).attr("data-modelo");
	$.ajax({
		method: "post",
		url: "php/agregarMuebleAlCarro.php",
		data: {Modelo:model},
		success: function(json){
			alert(json);
		$.confirm({
    title: 'Mueble agregado!',
    content: 'Su mueble ha sido agregado correctamente a su carro de compras',
    type: 'green',
    closeIcon: true,
    columnClass: 'medium',
    typeAnimated: true,
    buttons: {
        Nice: {
		text: 'Seguir comprando',
	    btnClass: 'btn-green',
	            action: function(){
            	}
        	},
 Confirm: {
		text: 'Ir a carrito',
	    btnClass: 'btn-blue',
	            action: function(){
             window.location.href = "https://sgviddb.000webhostapp.com/client/carrito.php"; 
            	}
        	}

}
	});

		},
		error: function(xhr, status, error) { alert('Error Add to Car'); }
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
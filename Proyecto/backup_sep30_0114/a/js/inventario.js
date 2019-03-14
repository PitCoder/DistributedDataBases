$(document).ready(function(){
    var Indice =0;
	var dataIndice =0;
	$.ajax({
		method: "post",
		url: "php/invenAlmaSelect.php",
		data: {id:123},
		success: function(json){
			$("#Almacenes").html(json);
			establecerCheckbox();
		},
		error: function(xhr, status, error) { alert('Server Error 2'); }
	});
        $('#modeloBusca').validetta({
	    display: 'inline',
	    errorTemplateClass : 'validetta-bubble',
            onValid : function(e){
                e.preventDefault();
				$.ajax({
				method:"post",
				url:"php/inventario.php",
				data: $("#modeloBusca").serialize(),
				success: function(resp){
						$("#Resultados").html(resp);
					},
				error: function(err,or){
					}
				});
            },
            onError : function( event ){}
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
//Funciones para trabajar con lo demas
var elementosDelForm =0;


function resetCatalogo()
{
	Indice=0;
	actualizarCatalogo();
}
function actualizarCatalogo() 
{
	var quienes = ["X"];
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

	var todosLosMuebles = getAllElementsWithAttribute("data-visible");
	dataIndice=0;
	//alert(todosLosMuebles.length);
	for(var i=0; i<todosLosMuebles.length; i++)
		{
			//alert(".alma-"+(i+1));
			$(".alma-"+(i+1)).hide();
			todosLosMuebles[i].setAttribute("data-visible","F");
			//alert(i);
		}
	for(var i=0; i<quienes.length;i++) 
		{
			//alert(quienes[i]);
			var aMostrar = document.getElementsByClassName(quienes[i]);
			for(var j=0; j<aMostrar.length; j++)
				{
					aMostrar[j].setAttribute("data-visible","V");
				}
		}
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
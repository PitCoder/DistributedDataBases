$(document).ready(function(){
	var model = $("title").attr("data-modelo");
	$("#Carro").click( function(){
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
	    			buttons:{
        				Nice:{
						text: 'Entendido',
	    					btnClass: 'btn-green',
		       		 	action: function(){
        	    				}
        				}}
				});
			},
			error: function(xhr, status, error) { alert('errorOnGetOrdenes'); }
		});

	});
	$.ajax({
		method: "post",
		url: "php/elMueble.php",

		data: {modelo:model},
		success: function(json){
			var mueble = JSON.parse(json);
			$('#fotoMueble').html(mueble.Foto);
			$('#descripMueble').html(mueble.Descripcion);
			$('#nombreMueble').html(mueble.Nombre);
			$('#catMueble').html(mueble.Categoria);
			$('#txtModelo').html(mueble.Modelo);
			$('#acabMueble').html(mueble.Acabados);
			$('#medidMueble').html(mueble.Medidas);
			$('#preMueble').html(mueble.Precio);
			$('#existenciasMueble').html(mueble.Existencias);

		},
		error: function(xhr, status, error) { alert('Error en cargar mueble'); }
	});
});
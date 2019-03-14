$(document).ready(function(){

/*  I N I T I A L I Z A T I O N  */

	document.getElementById("cuenta").className = "active";
	$("#cuenta-data").show();
	$("#cuenta-ordenes").hide();
	$.ajax({
		method:"post",
		url:"php/mcSelect.php",
		data: {id:0},
		success: function(resp){
			var cliente = JSON.parse(resp);
			$('#nombre').val(cliente.nombre);
			$('#telefono').val(cliente.telefono);
			$('#correo').val(cliente.correo);
			if(cliente.notify==0){
				$('#pop').prop('checked', ' ');
			} else {
				$('#notify').prop('checked', ' ');
			}
			Materialize.updateTextFields();
		},
		error: function(xhr, status, error) { alert('errorOnGetUser'); }
	});

	$.ajax({
		method: "post",
		url: "php/ordenes.php",
		data: {id:123},
		success: function(json){
			$("tbody").html(json);
		},
		error: function(xhr, status, error) { alert('errorOnGetOrdenes'); }
	});

/*  E V E N T S  */
$('tbody').on('click', 'button', function() {
    var i = $(this).attr('id');
    i = i.replace("pdf-","");
    i = parseInt(i);
window.open("php/crudPDF.php?id="+i);

});



	$("#datos").click( function(){
		document.getElementById("datos").className = "collection-item active";
		document.getElementById("orden").className = "collection-item";
		$("#cuenta-data").show();
		$("#cuenta-ordenes").hide();
	});

	$("#orden").click( function(){
		document.getElementById("datos").className = "collection-item";
		document.getElementById("orden").className = "collection-item active";
		$("#cuenta-data").hide();
		$("#cuenta-ordenes").show();
	});

	$('#formUpdate').validetta({
        	onValid : function(e){	
			e.preventDefault();
			$.ajax({
				method:"post",
				url:"php/mcUpdate.php",
				data: $("#formUpdate").serialize(),
				success: function(resp){
					if (resp==1) {
						$.confirm({
		    			    		title: 'Datos actualizados!',
   			    	 			content: 'Sus datos han sido actualizados correctamente, para visualizar sus cambios favor de presionar el bot&oacuten "Entendido"',
			    		    		type: 'green',
   		    	 				closeIcon: true,
		    		    			columnClass: 'medium',
		    		    			typeAnimated: true,
		    		    			buttons:{
       		    	 					Nice:{
			    						text: 'Entendido',
	 		    	   					btnClass: 'btn-green',
			    		       		 		action: function(){
			    		       		 			location.reload();
        		    		    				}
      		    	  					}}
			    			});
			    			
					} else { 
						//alert(resp);
						alert('Ha ocurrido un error recarga la página');
					}
				},
				error: function(err,or){
					alert("errorAJAX");
				}
			});
		}
        });

});
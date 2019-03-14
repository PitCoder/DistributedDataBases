$(document).ready(function(){

$("#map").googleMap();
	$("#map").addMarker({
		coords: [19.4522974, -99.1386972],
      		id: 'marker1',
		zoom: 10,
    	});

$('#codpost').keyup(function(e){
		var codpost = $(this).val();

		if(codpost.length==5){
		$.ajax({
			method:"GET",
			url:"https://maps.googleapis.com/maps/api/geocode/json?country=MX&address="+codpost+"&key=AIzaSyADnhOZHp46M5w439kgImpkzLdk1LonZDM",
			success: function(resp){
				if(resp.status='OK'){
					var lat = resp.results[0].geometry.location.lat;
					var lng = resp.results[0].geometry.location.lng;
					$("#map").removeMarker("marker1");
					$("#map").addMarker({
						coords: [lat, lng],
      						id: 'marker1'
    					});
					/*var marker = new google.maps.Marker({
          					position: uluru,
          					map: map
			        	});
					map = new google.maps.Map(document.getElementById('map'), {
  						center: {lat: -lat, lng: lng},
  						zoom: 8
					});*/
				}
			},
			error: function(err,or){
				alert("Postal Code not found");
			}
		});	
		}
	});

	$('#formEnvio').validetta({
  		onValid : function( event ) {
	    		event.preventDefault();
		$.ajax({
			method:"post",
			url:"php/compraEnvio.php",
			data: $("#formEnvio").serialize(),
			success: function(resp){
//alert(resp);
				if(resp==1){ 
 					$.confirm({
				    		title: 'Compra realizada!',
				    		content: 'Su compra se ha realizado y guardado, Gracias por preferir Muebler&iacuteas Quetzal',
				    		type: 'blue',
				    		closeIcon: true,
				    		columnClass: 'medium',
				    		typeAnimated: true,
    						buttons:{
				        		Nice:{
								text: 'Ok!',
	    							btnClass: 'btn-green',
					        	action: function(){
							document.location.href='miCuenta.php';
            						}
        						}}
						});
					//alert("Exito!, Su compra se ha guardado"); goto micuenta.php
				} else {
//alert(resp);
					$.confirm({
				    		title: 'Su compra no se ha podido realizar!',
				    		content: 'Perdone las molestias, nuestros t&eacutecnicos est&aacute atendiendo el problemal. ErrorCode:p/oE'+resp,
				    		type: 'red',
				    		closeIcon: true,
				    		columnClass: 'medium',
				    		typeAnimated: true,
    						buttons:{
				        		Nice:{
								text: 'Ok!',
	    							btnClass: 'btn-dark',
					        	action: function(){
							location.reload();
            						}
        						}}
						});
				}
			},
			error: function(err,or){
				$.confirm({
				    	title: 'Su compra no se ha podido realizar!',
				    	content: 'Perdone las molestias, nuestros t&eacutecnicos est&aacute atendiendo el problemal',
				    	type: 'red',
				    	closeIcon: true,
				    	columnClass: 'medium',
				    	typeAnimated: true,
    					buttons:{
				        	Nice:{
							text: 'Ok!',
	    						btnClass: 'btn-dark',
					        	action: function(){
							location.reload();
            					}
        					}}
					});
			}
			});
  		},
  		onError : function( event ){
    			alert( 'Stop bro !! There are some errors.');
  		}
	});



});
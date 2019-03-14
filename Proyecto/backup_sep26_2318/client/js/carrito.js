$(document).ready(function(){

	document.getElementById("carrito").className = "active";
	
        $.ajax({
		method: "post",
		url: "php/carritoSelect.php",
		data: {id:123},
		success: function(json){
			$("#Articulos").html(json);
		        //alert(json);
		        //eliminarArticulo();
		        calculoTotal();
		        calculoFinal();
		},
		error: function(xhr, status, error) { alert('errorOnCarrito'); }
	});

	$(document).on('click', 'button', function() {

		var i = $(this).attr('id');
		i = i.replace("del-","");
	    	$.confirm({
		    	title: '¿Eliminar mueble?',
		    	content:'Modelo: '+i,
	   		type: 'orange',
		    	closeIcon: true,
		    	columnClass: 'medium',
		    	typeAnimated: true,
		    	buttons: {
				confirm: {
					text: 'SI',
					btnClass: 'btn-green',
					action: function(){
			
						$.ajax({
							method: "post",
							url: "php/carritoActualizar.php",
							data: {id:i},
							success: function(res){
							//alert(res);
								document.getElementById(i).innerHTML = "";
								calculoTotal();
								calculoFinal();
						},
							error: function(xhr, status, error) { alert('errorOnActualizarCarrito'); }
						});
				    	}
				},
				cancel:{
					text: 'NO',
					btnClass: 'btn-red',
					action: function () {}
				}
			}
		});   
	});

	function changeCan(cantidad) {

	    	$.ajax({
			method: "post",
			url: "php/carritoCheckout.php",
			data: {can:cantidad},
			success: function(res){
alert(res);     
			},
			error: function(xhr, status, error){
				alert('errorOnActualizarCarrito'); }
		});
	
	};



	$("#elTol").on("click", function(){ 

		if(calculoFinal()>0)
		$.confirm({
			title: 'ALERTA',
			type: 'red',
			content: '¿Seguro que quiere eliminar todo su carrito?',
			autoClose: 'Cancelar|10000',
			buttons: {
				logoutUser: {
				text: 'ELIMINAR',
				btnClass: 'btn-red',
				action: function () {
					$.ajax({
					method: "post",
					url: "php/carritoActualizar2.php",
					data: {id:123},
					success: function(res){
						document.getElementById('Articulos').innerHTML = "";
						calculoTotal();
						calculoFinal();
					},
					error: function(xhr, status, error) { alert('errorOnActualizarCarrito2'); }
					});
				}
				},
				Cancelar: function () {}
			}
		});
	});

	$("#comprar").on("click", function(){

		if(calculoFinal()<=0){
			$.confirm({
				title: 'ALERTA',
				type: 'red',
				content: 'Ingresa muebles en el carrito',
				buttons: {
				logoutUser: {
					text: 'OK',
					btnClass: 'btn-green',
					action: function () {}
				}  
				}
			});
	}else{
		$.ajax({
			method: "post",
			url: "php/carritoComprobacion.php",
			data: {id:123},
			success: function(res){
				//alert(res);
				if(res==1){
					$.confirm({
					title: 'ALERTA',
					type: 'red',
					content: 'Inicia sesion para comprar',
					buttons: {
						logoutUser: {
							text: 'Iniciar sesion',
							btnClass: 'btn-green',
							action: function () {
								window.location.href = "https://sgviddb.000webhostapp.com/client/login.php"; 
							}
						},
						cancelar: {
							text: 'Cancelar',
							btnClass: 'btn-red',
							action: function () {}
						}        
					}
					});
				}else{
					window.location.href = "https://sgviddb.000webhostapp.com/client/compraEnvio.php";
				}
			},
			error: function(xhr, status, error) { alert('errorOnCarritoComprobacion'); }
		});


		}  
	});


	function calculoTotal(){
		elementosDelForm = document.getElementsByTagName('input');
		for( i = 0; i < elementosDelForm.length; i++){
			if(elementosDelForm[i].type == 'number'){
				elementosDelForm[i].addEventListener("change",actualizar);
			}
		}
	}

	function getCantidad(){
		var can = new Array();
		elementosDelForm = document.getElementsByTagName('input');
		for( i = 0; i < elementosDelForm.length; i++){
			if(elementosDelForm[i].type == 'number'){
				can.push(elementosDelForm[i].value);
			}   
		}

		changeCan(can);
	}

	function actualizar(){

		elementosDelForm = document.getElementsByTagName('input');

		for( i = 0; i < elementosDelForm.length; i++){
		if(elementosDelForm[i].type == 'number'){               
			if(elementosDelForm[i].defaultValue!=elementosDelForm[i].value){

				var ide = elementosDelForm[i].id.replace("cant-","");
				max = parseInt(elementosDelForm[i].max);
				if(elementosDelForm[i].value>max){
					$.confirm({
					title: 'Limite alcanzado de cantidad a comprar',
					content:'Se alcanzó el limite de '+max+' muebles a comprar del modelo: '+elementosDelForm[i].id.replace("cant-","")+' ¿Desea contactar a un agente de ventas?',
					type: 'red',
					closeIcon: true,
					columnClass: 'medium',
					typeAnimated: true,
					buttons: {
						confirm: {
							text: 'SI',
							btnClass: 'btn-green',
							action: function(){
							window.location.href = "https://sgviddb.000webhostapp.com/contacto.php"; }
						},
						cancel:{
							text: 'NO',
							btnClass: 'btn-red',
							action: function () {}
						}
					}
					});
					elementosDelForm[i].value = elementosDelForm[i].max;
				}
			
				if(elementosDelForm[i].value<elementosDelForm[i].min){
					elementosDelForm[i].value = elementosDelForm[i].min;}
				
				elementosDelForm[i].defaultValue = elementosDelForm[i].value;

				if(document.getElementById("dis-"+ide)!=null){
				var valor = document.getElementById("dis-"+ide);
				}else{
				var valor = document.getElementById("ndis-"+ide);} 
				
				valor = valor.innerHTML.replace("$","");
				valor = valor.replace("MXN","");
				valor = valor.replace(",","");
				valor = parseFloat(valor);
					
				var price = valor*elementosDelForm[i].value;
				price = price.format(2,3);
				document.getElementById("t"+ide).innerHTML = '$ '+price+' MXN';
				calculoFinal();
				getCantidad();
			}
			}
		}
	}

	function calculoFinal(){
		var subTotal = 0;
		var precios = document.getElementsByClassName("subTot");
		for(i = 0; i <precios.length; i++){
		
			var aux = precios[i].innerHTML;
			aux = aux.replace('$','');
			aux = aux.replace('MXN','');
			aux = aux.replace(',','');
			subTotal += parseFloat(aux);
		}
		
		var iva = subTotal * .16;
		var granTotal = subTotal + iva;
		subTotal = subTotal.format(2,3);
		iva = iva.format(2,3);
		granTotal = granTotal.format(2,3);
		
		document.getElementById("subtotal").innerHTML = '$ '+subTotal+' MXN';
		document.getElementById("iva").innerHTML = '$ '+iva+' MXN';
		document.getElementById("total").innerHTML = '$ '+granTotal+' MXN';
		granTotal = granTotal.replace(',','');
		return granTotal;
	}

	Number.prototype.format = function(n, x) {
		var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
		return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
	};
});

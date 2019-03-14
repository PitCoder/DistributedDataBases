$(document).ready(function(){
        document.getElementById('cuenta').className = 'active';

        $('#formLogin').validetta({
	    display: 'inline',
	    errorTemplateClass : 'validetta-bubble',
            onValid : function(e){
                e.preventDefault();
		$.ajax({
			method:"post",
			url:"php/login.php",
			data: $("#formLogin").serialize(),
			success: function(resp){
				if (resp==1) {
					  $.confirm({
				    		title: 'Bienvenido!',
				    		content: 'Gracias por preferir Muebler&iacuteas Quetzal',
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
		
				} else { 
					  $.confirm({
				    		title: 'Error!',
				    		content: 'Contrase&ntilde;a o usuario incorrectos',
				    		type: 'red',
				    		closeIcon: true,
				    		columnClass: 'medium',
				    		typeAnimated: true,
						});
				}
			},
			error: function(err,or){
						 $.confirm({
				    		title: 'Error de servidor!',
				    		content: 'Intentaremos solucionar el problema lo antes posible',
				    		type: 'dark',
				    		closeIcon: true,
				    		columnClass: 'medium',
				    		typeAnimated: true,
    						buttons:{
				        		Nice:{
								text: 'Ok!',
	    							btnClass: 'btn-dark',
					        	action: function(){
            						}
        						}}
						});
			}
			});
            },
            onError : function( event ){}
        });

        $('#formSignup').validetta({
            onValid : function( e ){
                 e.preventDefault();
           $.ajax({
		method:"post",
		url:"php/signUp.php",
		data: $("#formSignup").serialize(),
		success: function(resp){
			if (resp==1) {
				$.confirm({
			   		title: 'Bienvenido a la comunidad!',
			    		content: 'Gracias por preferir Muebler&iacuteas Quetzal',
			    		type: 'orange',
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
			} else { 
								$.confirm({
			   		title: 'ERROR en el servidor!',
			    		content: 'Sentimos las molestias',
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
		},
		error: function(err,or){
			alert("Server Error SignUp");
		}
		});
           },
            onError : function( event ){}
  	});
});
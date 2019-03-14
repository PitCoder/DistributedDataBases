$(document).ready(function(){
//        document.getElementById('cuenta').className = 'active';

        $('#formLogin').validetta({
	    display: 'inline',
	    errorTemplateClass : 'validetta-bubble',
            onValid : function(e){
                e.preventDefault();
		$.ajax({
			method:"post",
			url:"php/index.php",
			data: $("#formLogin").serialize(),
			success: function(resp){
				if (resp==1) {
					$.confirm({
						title: 'Bienvenido!',
				    		content: 'Sistema Gestor de Ventas e Inventario (SGVI)',
				    		type: 'blue',
				    		closeIcon: true,
				    		columnClass: 'medium',
				    		typeAnimated: true,
    						buttons:{
				        		Nice:{
								text: 'Ok!',
	    							btnClass: 'btn-green',
					        	action: function(){
								document.location.href='obra.php';
            							}
        						}
        					}
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
				    		content: 'Reportar el problema al área de TI lo antes posible',
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

});
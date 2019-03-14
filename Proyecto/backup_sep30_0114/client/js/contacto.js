$(document).ready(function(){
        document.getElementById('contacto').className = 'active';

        $('#formContacto').validetta({
            onValid : function(e){
                e.preventDefault();
		$.ajax({
			method:"post",
			url:"/../mails.php",
			data: $("#formContacto").serialize(),
			success: function(resp){
				 $.confirm({
    title: 'Mensaje enviado',
    content: 'A la brevedad posible un agente de ventas se contactará con usted',
    type: 'green',
    closeIcon: true,
    columnClass: 'medium',
    typeAnimated: true,
    buttons: {
        Nice: {
		text: 'OK',
	    btnClass: 'btn-green',
	            action: function(){
            	}
        	},
}
	});
			}, 
			error: function(err,or){
				alert("errorAJAX");
			} 
			});
            },
            onError : function( event ){}
        });
});
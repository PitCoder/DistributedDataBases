$(document).ready(function(){
//        document.getElementById('cuenta').className = 'active';

		$.ajax({
			method:"post",
			url:"php/obra.php",
			data: $("#formLogin").serialize(),
			success: function(resp){
				

				$("#container").html(resp);
				
			},
			error: function(err,or){
						
						
				alert("ERROR MASIVO");
			}
			});
			
	$("#all").click(function(){
	    $('.pasadas').show();
        $('.futuras').show();
        $('#filtro').html('Todas<span class="glyphicon glyphicon-triangle-bottom s3"></span>');
    });
    
    $("#prev").click(function(){
        $('.pasadas').show();
        $('.futuras').hide();
        $('#filtro').html('Pasadas<span class="glyphicon glyphicon-triangle-bottom s3"></span>');
    });
    
    $("#foll").click(function(){
        $('.pasadas').hide();
        $('.futuras').show();
        $('#filtro').html('Futuras<span class="glyphicon glyphicon-triangle-bottom s3"></span>');
    });
			
});

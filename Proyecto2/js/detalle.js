$(document).ready(function(){
//        document.getElementById('cuenta').className = 'active';

        $aux = $(".content").attr('id');
        alert($aux);
        
		$.ajax({
			method:"post",
			url:"php/detalle.php",
			data: {obra:$aux},
			success: function(resp){
				$(".content").html(resp);
			},
			error: function(err,or){
				alert("ERROR MASIVO");
			}
			});
});

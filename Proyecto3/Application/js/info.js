$(document).ready(function(){
//        document.getElementById('cuenta').className = 'active';

        
        /*$.ajax({
    		method:"post",
    		url:"php/info1.php",
    		data: {},
    		success: function(resp){
    			//$("#relaciones").html(resp);
    			$("#dropdown2").html(resp);
    		},
    		error: function(err,or){
    			alert("ERROR MASIVO");
    		}
    	});*/
    	$('select').material_select();
    	
        $("#dropdown2").on("click","li a",function(){
            /*alert($(this).attr('id'));
            alert($(this).text());*/
            $('#add').attr('data-sitio',$(this).attr('id'));
            $('#filtro').html($(this).text()+'<span class="glyphicon glyphicon-triangle-bottom s3"></span>');
            relaciones($(this).attr('id'));
        });
        
        $("#add").on("click",function(){
            alert($(this).attr('data-sitio'));
            select($(this).attr('data-sitio'));
        });
        
        /*$("#fragmentos").on("click",".collection-item",function(){
            $(".collection-item").attr("class",'collection-item');
            $(this).attr("class",'collection-item active');
            $("#fragment").html($(this).html());
            
            $("#colocar").attr('data',$(this).attr('id'));
            //alert($(this).attr('id'));
        });*/
        
        function relaciones($id){
            $.ajax({
        		method:"post",
        		url:"php/info1.php",
        		data: {base : $id},
        		success: function(resp){
        		    alert(resp);
        		    $('select').material_select('destroy');
        			$("#attributes").html(resp);
        			$('select').material_select();
        		},
        		error: function(err,or){
        			alert("ERROR MASIVO");
        		}
        	});
        }
        
        function select($sitio){
            $.ajax({
        		method:"post",
        		url:"php/info2.php",
        		data: "sitio=" + $sitio + "&" + $('#attributes').serialize(),
        		success: function(resp){
        		    alert(resp);
        		    $("#data").html(resp);
        		},
        		error: function(err,or){
        			alert("ERROR VERTICAL2");
        		}
        	});
        }
        
        
        

        
});


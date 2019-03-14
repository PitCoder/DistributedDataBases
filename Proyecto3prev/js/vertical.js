$(document).ready(function(){
//        document.getElementById('cuenta').className = 'active';

        
        $('select').material_select();
        
        
        $.ajax({
    		method:"post",
    		url:"php/horizontal1.php",
    		data: {},
    		success: function(resp){
    			//$("#relaciones").html(resp);
    			$("#dropdown2").html(resp);
    		},
    		error: function(err,or){
    			alert("ERROR MASIVO");
    		}
    	});
    	
        $("#dropdown2").on("click","li",function(){
            atributes($(this).text());
            $('#filtro').html($(this).text()+'<span class="glyphicon glyphicon-triangle-bottom s3"></span>');
        });
        
        $("#sitios").on("click","li",function(){
            $('#sitio').html($(this).text()+'<span class="glyphicon glyphicon-triangle-bottom s3"></span>');
        });
        
        $("#add").on("click",function(){
            fragment($('#filtro').text());
        });
        
        $("#fragmentos").on("click",".collection-item",function(){
            $(".collection-item").attr("class",'collection-item');
            $(this).attr("class",'collection-item active');
            $("#fragment").html($(this).html());
            
            $("#colocar").attr('data',$(this).attr('id'));
            //alert($(this).attr('id'));
        });
        
        $("#colocar").on('click',function(){
            //alert( 'colocar:' + $(this).attr("data") + 'en ' + $("#sitio").text() );
            colocar($(this).attr("data"),$("#sitio").text());
        });
        
        
        $("#completeness").on('click',function(){
            completeness();
        });
        
        function atributes($relacion){
            $.ajax({
        		method:"post",
        		url:"php/vertical1.php",
        		data: {data : $relacion},
        		success: function(resp){
        		    
        		    $('select').material_select('destroy');
        			$("#attributes").html(resp);
        			$('select').material_select();
        			//$("#dropdown2").html(resp);
        			
        			$("#fragmentos").html("");
        		},
        		error: function(err,or){
        			alert("ERROR MASIVO");
        		}
        	});
        }
        
        function fragment($relacion){
            $.ajax({
        		method:"post",
        		url:"php/vertical2.php",
        		data: "relacion=" + $relacion + "&" + $('#attributes').serialize(),
        		success: function(resp){
        		    if(resp==-1)
        		        alert("ERROR");
        		    else if (resp===0)
        		        alert("YA EXISTE EL FRAGMENTO");
        		    else
        			    $("#fragmentos").html($("#fragmentos").html()+resp);
        		},
        		error: function(err,or){
        			alert("ERROR VERTICAL2");
        		}
        	});
        }
        
        function completeness(){
            $.ajax({
        		method:"post",
        		url:"php/vertical4.php",
        		data: {},
        		success: function(resp){
        			if(resp==1)
        			    alert("ES COMPLETO");
        			else if(resp===0)
        			    alert("NO ES COMPLETO");
        			else
        			    alert("WHA JAPPEN ? ? ?");
        		},
        		error: function(err,or){
        			alert("ERROR VERICAL4");
        		}
    	    });
        }
        
        function colocar($id,$sitio){
            $.ajax({
        		method:"post",
        		url:"php/vertical3.php",
        		data: "id=" + $id +"&sitio=" + $sitio,
        		success: function(resp){
        		    alert(resp);
        		},
        		error: function(err,or){
        			alert("ERROR VERTICAL3");
        		}
        	});
        }
        
});


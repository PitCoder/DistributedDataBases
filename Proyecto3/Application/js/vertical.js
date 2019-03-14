$(document).ready(function(){
//        document.getElementById('cuenta').className = 'active';

        
        $('select').material_select();
        
        $("#colocar").hide();
        
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
            $("#colocar").hide();
        });
        
        $("#sitios").on("click","li a",function(){
            $('#sitio').html($(this).text()+'<span class="glyphicon glyphicon-triangle-bottom s3"></span>');
            $("#colocar").attr('data-sitio',$(this).attr('id'));
        });
        
        $("#add").on("click",function(){
            fragment($('#filtro').text());
            $("#colocar").hide();
        });
        
        $("#fragmentos").on("click",".collection-item",function(){
            $(".collection-item").attr("class",'collection-item');
            $(this).attr("class",'collection-item active');
            $("#fragment").html($(this).html());
            
            $("#colocar").attr('data-id',$(this).attr('id'));
        });
        
        $("#fragmentos").on("click",".close.material-icons",function(){
            quitFragment($(this).attr('id'));
            $("#colocar").hide();
        });
        
        $("#colocar").on('click',function(){
            colocar($(this).attr("data-id"),$(this).attr("data-sitio"));
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
        			$("#fragment").html("");
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
        		    else if(resp===0 || resp=='0')
        		        alert("YA EXISTE EL FRAGMENTO");
        		    else
        			    $("#fragmentos").html($("#fragmentos").html()+resp);
        		},
        		error: function(err,or){
        			alert("ERROR VERTICAL2");
        		}
        	});
        }
        
        function quitFragment($id){
            alert($id);
            $.ajax({
        		method:"post",
        		url:"php/vertical5.php",
        		data: {id : $id},
        		success: function(resp){
        		    $("#fragment").html("");
        		    if(resp==-1)
        		        alert("Error de Conexion");
        		    else if(resp===0)
        		        alert("El fragmento ha sido previamente eliminado");
        		    else
        		        $("#fragmentos").html(resp);
        		},
        		error: function(err,or){
        			alert("ERROR VERTICAL5");
        		}
        	});
        }
        
        function completeness(){
            $.ajax({
        		method:"post",
        		url:"php/vertical4.php",
        		data: {},
        		success: function(resp){
        			if(resp==1){
        			    alert("ES COMPLETO");
                        $("#colocar").show();
        			}
        			else if(resp==0)
        			    alert("NO ES COMPLETO");
        			else
        			    alert(resp);
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
        		    console.log(resp);
        		},
        		error: function(err,or){
        			alert("ERROR VERTICAL3");
        		}
        	});
        }
        
});


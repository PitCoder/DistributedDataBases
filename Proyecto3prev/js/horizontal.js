$(document).ready(function(){
//        document.getElementById('cuenta').className = 'active';
		var rel = "Ninguna";	//Relacion
		var selecAtributo = "Ninguna"; //atributo
		
        $(document).ready(function() {
            $('select').material_select();
        });
        
        $.ajax({
    		method:"post",
    		url:"php/horizontal1.php",
    		data: {},
    		success: function(resp){
    			$("#relaciones").html(resp);
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
        
        $("#relaciones").on("click","li",function(){
            $('#choice').html($(this).text()+'<span class="glyphicon glyphicon-triangle-bottom s3"></span>');
        });
        
        /*$(".chip").click(function(){
            $('.chip').attr("class",'chip');
            $(this).attr("class",'chip orange');
        });*/
        
        $("#attributes").on("click",".chip",function(){
            $('.chip').attr("class",'chip');
            $(this).attr("class",'chip orange');
            $('#atributo').html($(this).text());
			selecAtributo = ""+$(this).text();
        });
        
       
		$("#agregar").click(function(){
			//alert("Holap");
			var x = document.querySelectorAll("li.active span");
			if(rel=="Ninguna")
				{
					alert("Primero seleccione una relación");
				}
			else if(selecAtributo=="Ninguna")
				{
					alert("Primero seleccione un atributo");
				}
			else if(x.length==0)
				{
					alert("Primero seleccione un operador");
				}
			else
				{
					var atributo = document.getElementById("atributo").textContent;
					var operador = x[0].innerHTML;
					var valor = document.getElementById("c").value;
					if(operador=="&gt;")
						operador = ">";
					else if(operador=="&lt;")
						operador = "<";
					else if(operador=="&gt;=")
						operador = ">=";
					else if(operador=="&lt;=")
						operador = "<=";
					//alert(operador);
					var data = {'rel':rel, 'atributo': atributo, 'operador':operador, 'valor': valor};
					
					$.ajax({
						method:"post",
						url:"php/insertarPredicadoS.php",
						data: data,
						success: function(resp){
							//alert(resp);
							$('#predicados').html(resp);
						},
						error: function(err,or){
							alert("ERROR MASIVO");
						}
					});
				}
		});
			
			
		$(".select-dropdown").click(function(){
			alert("Que onda");
		});
		
        function atributes($relacion){
			rel = $relacion;
			selecAtributo = "Ninguna";
            $.ajax({
        		method:"post",
        		url:"php/horizontal2.php",
        		data: {data : $relacion},
        		success: function(resp){
        			$("#attributes").html(resp);
        			//$("#dropdown2").html(resp);
        		},
        		error: function(err,or){
        			alert("ERROR MASIVO");
        		}
        	});
        }
});


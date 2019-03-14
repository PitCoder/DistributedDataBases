<?php 
	require_once('Relacion.php');
	
	class Base{
	
		private $relaciones; // = array();
		
		//CONSTRUCTOR AND GETS
		
		function __construct($sitio) {
			$this->relaciones = array();
			
			if($sitio==0){
				include('MQuetzalDB.php');
				$mysqli = new mysqli($servername, $username, $password, $database);
				
			}else{
				include('MQsitio2.php');
				$mysqli = new mysqli($servername, $username, $password, $database);
			}
			
			$mysqli->query("SET NAMES 'utf8'");
			$result = $mysqli->query("SHOW TABLES");
			$mysqli->close();

			if($result->num_rows!=0){
				if($sitio==0){
					while($row=$result->fetch_array()){
						$this->relaciones[] = new Relacion($row[0]);
					    //echo substr($row[0],1,1);
					}
						
				}else if($sitio==1){
					while($row=$result->fetch_array())
					    if(substr($row[0],1,1)=='1')
    					    $this->relaciones[] = new Relacion($row[0]);
						
				}else if($sitio==2){
					while($row=$result->fetch_array())
					if(substr($row[0],1,1)=='2')
						$this->relaciones[] = new Relacion($row[0]);
						
				}else{ //($sitio==0)
					while($row=$result->fetch_array())
					if(substr($row[0],1,1)=='3')
						$this->relaciones[] = new Relacion($row[0]);
			    }
			} else
			echo "SHIT";
		}
		
		function getRelaciones(){ return $this->relaciones; }
		function getRelacion($r){
		    
		    for($i=0;$i<count($this->relaciones);$i++)
		        if( $r == $this->relaciones[$i]->getNombre() )
		            return $this->relaciones[$i];
		            
		    return null;
		}

	};
	
?>

<?php 

    require_once('Atributo.php');

	class Relacion{
	
		private $nombre;
		private $atributos = array();
		
		//CONSTRUCTOR AND GETS
		
		function __construct($nombre) {
			$this->nombre = $nombre;
		}
		
		function getNombre(){ return $this->nombre; }
		function getAtributos(){ return $this->atributos; }
		
		function getPK(){
			$PK = array();
			for($i=0;$i<count($this->atributos);$i++)
				if( $this->atributos[$i]->esPK() )
					$PK[] = $this->atributos[$i];
					
			return $PK;
		}
		
		function getAtributo($a){ 
		
			for($i=0;$i<count($this->atributos);$i++)
				if( $a==$this->atributos[$i]->getNombre() )
					return $this->atributos[$i];
					
			return null;
		}
		
		/*
		function getPK(){ // SHOULD RETURN ARRAY (DONE UPPER)
			
			for($i=0;$i<count($this->atributos);$i++)
				if( $this->atributos[$i]->esPK() )
					return $this->atributos[$i];
			return null;
		}*/
		
		function setAtributos(){
		    $this->atributos = array();
		    
		    include('MQuetzalDB.php');
		    $mysqli = new mysqli($servername, $username, $password, $database);
			$mysqli->query("SET NAMES 'utf8'");
			
			$result = $mysqli->query(
				"DESC $this->nombre"
			);
			$mysqli->close();
			
			if($result->num_rows==0)
			    return false;
			    
			while($row=$result->fetch_assoc()){
			    $aux = 0;
			    if($row['Key']=='PRI')
			        $aux=1;
			    
			    
			    $this->atributos[] = new Atributo($row['Field'],$row['Type'],$aux);
			}
			
			return true;
			
		}
		
	};
	
?>

<?php 

    	require_once('Relacion.php');
    	require_once('Fragmento.php');

	class Vertical extends Fragmento{
	
		private $origen;	//String = relationName
		private $atributos;     //boolean					
		
		//CONSTRUCTOR AND GETS
		
		function __construct($id, $origen, $pk) { //PK es ARRAY
			parent::__construct($id);
			
			/*$this->origen = $origen;
			$this->atributos  = array();
			$this->atributos[] = $pk;*/
			
			$this->origen = $origen;
			$this->atributos  = array();
			
			for($i=0;$i<count($pk);$i++)
				$this->atributos[] = $pk[$i];
		}
		
		function getAtributos(){ return $this->atributos; }
		function getOrigen(){ return $this->origen; }
		
		function addAtributo($a){
			if( !$this->existe($a) )
				$this->atributos[] = $a;
		}
		
		function existe($atributo){
			for($i=0;$i<count($this->atributos);$i++)
				if($this->atributos[$i]->equals($atributo))
					return true;
			return false;
		}
		
		function getSQL(){
		    $sql = "SELECT ";
		    
		    for($i=0;$i<count($this->atributos);$i++){
        	    if($i!=0)
        	        $sql .= ", ";
        	    $sql .= $this->atributos[$i]->getNombre();
        	}
		    $sql .= " FROM ".$this->origen;
		    
		    return $sql;
		}
		
		function getCreate(){
		    $sql = "CREATE TABLE ".getDate()['yday'].$this->origen.$this->getId()." (";
		    
		    for($i=0;$i<count($this->atributos);$i++){
        	    if($i!=0)
        	        $sql .= ", ";
        	       
        	    $sql .= $this->atributos[$i]->getNombre()." ".$this->atributos[$i]->getTipo();
        	    if($this->atributos[$i]->esPK())
        	        $sql .= " PRIMARY KEY";
        	}
		    //$sql .= " FROM ".$this->origen;
		    
		    return $sql.")";
		}
		
		function getInsert(){
		    include('MQuetzalDB.php');
			$mysqli = new mysqli($servername, $username, $password, $database);
			$mysqli->query("SET NAMES 'utf8'");

			$result = $mysqli->query( $this->getSQL() );
			
			$mysqli->close();

			if($result->num_rows!=0)
				while($row=$result->fetch_array()){
					$values[] = $row;
				}
		    
		    $sql = "INSERT INTO ".getDate()['yday'].$this->origen.$this->getId()." VALUES ";
		    
		    for($x=0;$x<count($values);$x++){
		        if($x==0)
		            $sql .= "(";
		        else
		            $sql .= ",(";
		            
		        for($y=0;$y<count($this->atributos);$y++)
		               if($y==0)
		                $sql .= "'".$values[$x][$y]."'";
		               else
		                $sql .= ",'".$values[$x][$y]."'";
		        $sql .= ")";
		    }
		    
		    return $sql;
		}
		
		function equals($object){
			if($object->get_class()==$this->get_class())
				if($this->origen==$object->getOrigen()){
				/*if(count($object->getAtributos())==count($this->atributos))
					
					for($i=0;$i<count($this->atributos);$i++)
						if(!$this->atributos[$i]->getNombre()==$object->getAtributos()[$i]->getNombre())
							return false; //MISSING COMPARATING ATTRIBUTE PER ATTRIBUTE*/
					return true;
				}
				
			return false;
		}
		
		
	};
	
?>

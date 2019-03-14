<?php 

	require_once('PredicadoMinitermino.php');
	require_once('Fragmento.php');

	class Horizontal extends Fragmento{

		private $tiene; 	//Predicado Minitermino

		//CONSTRUCTOR AND GETS

		function __construct($id,$mini) {
			parent::__construct($id);
			
			$this->tiene = $mini;
		}

        function getTiene(){ return $this->tiene; }
        function getCreate(){
		    $sql = "CREATE TABLE ".getDate()['yday'].$this->tiene->getOrigenPredicadoB().$this->getId()." (";
		    $relacion = new Relacion($this->tiene->getOrigenPredicadoB());
			$relacion->setAtributos();
			$atributos=$relacion->getAtributos();
		    for($i=0;$i<count($atributos);$i++){
        	    if($i!=0)
        	        $sql .= ", ";
        	       
        	    $sql .= $atributos[$i]->getNombre()." ".$atributos[$i]->getTipo();
        	    if($atributos[$i]->esPK())
        	        $sql .= " PRIMARY KEY";
        	}
		    //$sql .= " FROM ".$this->origen;
		    
		    return $sql.")";
		}
		
		function getInsert($Sitio){
		    include('MQuetzalDB.php');
			$mysqli = new mysqli($servername, $username, $password, $database);
			$mysqli->query("SET NAMES 'utf8'");
			$relacion = new Relacion($this->tiene->getOrigenPredicadoB());
			$relacion->setAtributos();
			$atributos=$relacion->getAtributos();
			$result = $mysqli->query( $this->tiene->getSQL() );
			
			$mysqli->close();

			if($result->num_rows!=0)
				while($row=$result->fetch_array()){
					$values[] = $row;
				}
		    
		    $sql = "INSERT INTO H".$Sitio.$this->tiene->getOrigenPredicadoB()." VALUES ";
		    
		    for($x=0;$x<count($values);$x++){
		        if($x==0)
		            $sql .= "(";
		        else
		            $sql .= ",(";
		            
		        for($y=0;$y<count($atributos);$y++)
		               if($y==0)
		                $sql .= "'".$values[$x][$y]."'";
		               else
		                $sql .= ",'".$values[$x][$y]."'";
		        $sql .= ")";
		    }
		    
		    return $sql;
		}
	};

?>

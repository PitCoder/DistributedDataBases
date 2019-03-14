<?php 

	require_once('Usuario.php');
	require_once('Vertical.php');
	require_once('Horizontal.php');
	require_once('GestorPredicado.php');

	class Administrador extends Usuario{

		private $crea; // Fragmentos
		private $controla; // Gestor de Predicado

		//CONSTRUCTOR AND GETS

		function __construct($id) {
		//	parent::_construct($id);
			parent::__construct($id);
			
			$this->crea = array();
			$this->controla = new GestorPredicado();
		}
		
		function getFragmentos(){ return $this->crea; }
		function getControla(){ return $this->controla; }
		function resetCrea(){ $this->crea = array(); }
		
		function getFragmento($id){ 
		    for($i=0;$i<count($this->crea);$i++)
		        if($this->crea[$i]->getId()==$id)
		            return $this->crea[$i];
		    return null;
		}

        function addFragmento($fragmento){
        	if(!$this->existe($fragmento)){
			    $this->crea[] = $fragmento;
			    return true;
        	}
        	return false;
        }
        
        function quitFragmento($id){
            for($i=0;$i<count($this->crea);$i++)
                if($this->crea[$i]->getId()==$id){
                    unset($this->crea[$i]); // remove item at index i
                    $this->crea = array_values($this->crea); // reindex array
                    return true;
                }
            return false;
        }
        
        function existe($fragmento){
        	for($i=0;$i<count($this->crea);$i++)
        		if(get_class($this->crea[$i])==get_class($fragmento))
        		if($this->crea[$i]->getOrigen()==$fragmento->getOrigen()){
        		    $a = $this->crea[$i]->getAtributos();
        		    $b = $fragmento->getAtributos();
        		    
        		if(count($a)==count($b)){
                    for($i=0;$i<count($a);$i++)
				        if(!($a[$i]->getNombre()==$b[$i]->getNombre()))
					        return false;
					return true;
        		}}
        	return false;
        }
        
        function completenessV($relacion){
            $aux = $relacion->getAtributos();
            for($x=0;$x<count($relacion->getAtributos());$x++){
                $existe = false;
                
                $a = 
                $a = ($relacion->getAtributos())[$x];
                
                for($y=0;$y<count($this->crea);$y++)
                
                    if($this->crea[$y]->existe($a)){
                        $existe = true;
                        break;
                    }
                    
                if(!$existe)
                    return false;
            }
            return true;
        }
        
        function getGeneralOrigen(){
            
            $n = count($this->crea);
            
            if($n!=0)
                $origen = $this->crea[0]->getOrigen();
            else
                return null;
                
            for($i=0;$i<$n;$i++)
        		if($origen != $this->crea[$i]->getOrigen())
        		    return null;
        		
        	return $origen;
        }
        
        // PROBABLY NEEDE METHODS (STATE: UNCODED)
        //function existe($fragmento){ return false; }
        function getVerticales($fragmento){ return null; }
        function getHorizontales($fragmento){ return null; }
        
        function resetPredicadosSimples(){ $this->controla->resetSimples(); }
        function agregarPredicadoSimple($id,$origen, $atributo, $operador, $valor)
			{
				$this->controla->agregarPredicadoSimple($id,$origen, $atributo, $operador, $valor);
			}
		function saberPredicadosSimples()
			{
				return $this->controla->getSimples();
			}
         function crearFragmentosHorizontales()
			{
				$result = $this->controla->comprobarCompletitud();
				
				if($result == -2)
					{
						return -2;
					}
				else if($result == -1)
					{
						return -1;
					}
				else if($result==1)
					{
						$min = $this->controla->getMiniterminos();
						$this->resetCrea();
						for($i=0; $i<count($min); $i++)
							{
								$ho = new Horizontal(($i+1),$min[$i]);
								$this->addFragmentoHo($ho);
							}
						return 1;
					}
				else
					{
						return 0;
					}
			}
		function addFragmentoHo($fragmento)
			{
				array_push($this->crea, $fragmento);
			}
		function colocarFragmento($id,$sitio)
		    {
		        include('classes/MQsitio2.php');
		        $fragmento = $this->getFragmento($id);
		        $sql = $fragmento->getInsert($sitio);
				$mysqli = new mysqli($servername, $username, $password, $database);
				$mysqli->query("SET NAMES 'utf8'");
				
				
				$result = $mysqli->query($sql);
				
				
				if($mysqli->affected_rows>0)
					return true;	
				else
					return false;	
		    }
		
		function colocarVertical($id,$sitio){
		    
			include('classes/MQsitio2.php');
			$fragmento = $this->getFragmento($id);
			$mysqli = new mysqli($servername, $username, $password, $database);
			$mysqli->query("SET NAMES 'utf8'");
		
			$result = $mysqli->query($fragmento->getCreate($sitio));
			$result = $mysqli->query($fragmento->getInsert($sitio));
		
			if($mysqli->affected_rows>0)
				return true;	
			else
				return false;	
	    }
	};

?>

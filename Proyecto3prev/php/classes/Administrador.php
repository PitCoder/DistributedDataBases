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
            
            for($x=0;$x<count($relacion->getAtributos());$x++){
                $existe = false;
                $a = $relacion->getAtributos()[$x];
                
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

	};

?>

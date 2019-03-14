<?php 

	class Atributo{
	
		private $nombre;
		private $tipo;
		private $pk;
		
		//CONSTRUCTOR AND GETS
		
		function __construct( $nombre, $tipo, $pk ) {
   			$this->nombre = $nombre;
   			$this->tipo = $tipo;
   			if($pk==1)
   			    $this->pk = true;
   			else
   			    $this->pk = false;
		}
		
		function getNombre(){ return $this->nombre; }
		function getTipo(){ return $this->tipo; }
		function esPK(){ return $this->pk; }
		
		function equals($a){
			if($this->nombre==$a->getNombre() && 
			   $this->tipo==$a->getTipo() &&
			   $this->pk==$a->esPK() )
				return true;
			return false;
		}
		
	};
	
?>

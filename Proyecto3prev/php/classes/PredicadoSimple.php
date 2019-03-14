<?php 
	//Falta saber la regla de las comillas en mysql
	require_once('Atributo.php');

	class PredicadoSimple{

        private $id;
		private $origen; 	// Relacion
		private $atributo; 	// Atributo
		private $operador; 	//String
		private $valor; 	//String

		//CONSTRUCTOR AND GETS

		function __construct($id,$origen, $atributo, $operador, $valor) {
			$this->id=$id;
			$this->origen=$origen;
			$this->atributo=$atributo;
			$this->operador=$operador;
			$this->valor=$valor;
		}

		function getOrigen(){ return $this->origen;}
		function getAtributo(){ return $this->atributo;}
		function getOperador(){ return $this->operador;}
		function getValor(){ return $this->valor;}
		function getID(){ return $this->id;}
		
		function getSQL(){
			return " ".$this->atributo." ".$this->operador." '".$this->valor."' ";
		}
			
		function comparar($origen, $atributo, $operador, $valor)
			{
				return $this->origen==$origen && 
						$this->atributo==$atributo &&
						$this->operador=$operador &&
						$this->valor==$valor;
			}
	};

?>

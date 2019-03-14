<?php 
	//Falta saber si el NOT funciona como se cree
	require_once('PredicadoSimple.php');

	class PredicadoMinitermino{

		private $predicadoA;		//PredicadoSimple
		private $predicadoB;		//PredicadoSimple
		private $formas;		//boolean[2]

		//CONSTRUCTOR AND GETS

		function __construct($predicadoA, $predicadoB,$booleanA,$booleanB) {
			$this->predicadoA=$predicadoA;
			$this->predicadoB=$predicadoB;
			$this->formas = array($booleanA,$booleanB);
		}
		
		function getFormas(){ return $this->formas;}
		function getPredicadoA(){ return $this->predicadoA;}
		function getPredicadoB(){ return $this->predicadoB;}
		function getOrigenPredicadoA(){ return $this->predicadoA->getOrigen();}
		function getOrigenPredicadoB(){ return $this->predicadoB->getOrigen();}
		
		//Metodos
		function getSQL()
			{
				$condicionA = "";
				$condicionB = "";
				if($this->formas[0])//A
					{
						$condicionA = $this->predicadoA->getSQL();
					}
				else
					{
						$condicionA = " not(".$this->predicadoA->getSQL().") ";
					}
				if($this->formas[1])//B
					{
						$condicionB = $this->predicadoB->getSQL();
					}
				else
					{
						$condicionB = " not(".$this->predicadoB->getSQL().") ";
					}
				return "SELECT * FROM ".$this->predicadoA->getOrigen()." WHERE (".$condicionA." and ".$condicionB.")";
			}
		function comprobarMinimalidad()
			{
				
				include('MQuetzalDB.php');
				$mysqli = new mysqli($servername, $username, $password, $database);
				$mysqli->query("SET NAMES 'utf8'");
				
				
				$result = $mysqli->query($this->getSQL());
				
				$mysqli->close();
				
				if($result->num_rows>0)
					return true;	
				else
					return false;				
			}
	};

?>

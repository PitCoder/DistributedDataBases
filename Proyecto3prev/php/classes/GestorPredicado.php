<?php 

	require_once('PredicadoSimple.php');
	require_once('PredicadoMinitermino.php');

	class GestorPredicado{

		private $miniterminos;	//ConjuntoPredicadoMinitermimo[]
		private $simples = array();	//PredicadoSimple

		//CONSTRUCTOR AND GETS

		function __construct() {
			$this->miniterminos;
			$this->simples;
		}
		
		function getSimples(){ return $this->simples;}
		function getMiniterminos(){ return $this->miniterminos;}
		
		function resetSimples(){ $this->simples = array();}
		function resetMinitermnos(){ $this->miniterminos = array();}
		//METHODS
		function saberSiguienteIDPS()
		    {
		        $Max = 1;
		        for($i=0;$i<count($this->simples);$i++)
		            {
		                if($Max <=$this->simples[$i]->getID() )
		                    {
		                        $Max = $this->simples[$i]->getID()+1;
		                    }
		            }
		         return $Max;
		        
		    }
		function agregarPredicadoSimple($id,$origen, $atributo, $operador, $valor)
			{
				$s = new PredicadoSimple($id,$origen, $atributo, $operador, $valor);
				array_push($this->simples,$s);
			}
		
		function crearPredicadoMinitermino()
			{
				if(count($this->simples)>1)
					{
						for($i=0; $i<count($this->simples);$i++){
							for($j=$i+1; $j<count($this->simples);$j++){
								if($this->simples[$j]->gerOrigen()==$this->simples[$i]->gerOrigen())
									{
										$min1 = new PredicadoMinitermino($this->simples[$i],$this->simples[$j]->gerOrigen(),true,true);
										$min1->comprobarMinimalidad();
										$min2 = new PredicadoMinitermino($this->simples[$i],$this->simples[$j]->gerOrigen(),true,false);
										$min2->comprobarMinimalidad();
										$min3 = new PredicadoMinitermino($this->simples[$i],$this->simples[$j]->gerOrigen(),false,true);
										$min3->comprobarMinimalidad();
										$min4 = new PredicadoMinitermino($this->simples[$i],$this->simples[$j]->gerOrigen(),false,false);
										$min4->comprobarMinimalidad();
										array_push($this->miniterminos,$min1,$min2,$min3,$min4);
										
									}
								}
						}
					}
			}


	};

?>

<?php 

	require_once('PredicadoSimple.php');
	require_once('PredicadoMinitermino.php');
    require_once('Relacion.php');

	class GestorPredicado{

		private $miniterminos = array();	//ConjuntoPredicadoMinitermimo[]
		private $simples;	//PredicadoSimple[]

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
		function quitarPredicadoSimple($id)
			{
				for($i=0;$i<count($this->simples);$i++)
		            {
		                if($id ==$this->simples[$i]->getID() )
		                    {
		                        array_splice($this->simples, $i, 1);
		                    }
		            }
			}
		
		function agregarPredicadoSimple($id,$origen, $atributo, $operador, $valor)
			{
				$s = new PredicadoSimple($id,$origen, $atributo, $operador, $valor);
				if(!$this->existePredicadoSimple($s))
					{
						array_push($this->simples,$s);
					}
			}
		function existePredicadoSimple($s)
			{
				for($i=0;$i<count($this->simples);$i++)
					{
						if($this->simples[$i]->equals($s)){
							return true;}
					}
				return false;
			}
		
		function crearPredicadoMinitermino()
			{
				$this->resetMinitermnos();
				$relacionesCompletas = array();
				$respuesta = array();
				for($i=0; $i<count($this->simples);$i++){
				for($j=$i+1; $j<count($this->simples);$j++){
				if($this->simples[$j]->getOrigen()==$this->simples[$i]->getOrigen()){
					$cumplen = array();
					$min1 = new PredicadoMinitermino($this->simples[$i],$this->simples[$j],true,true);
					$min2 = new PredicadoMinitermino($this->simples[$i],$this->simples[$j],true,false);
					$min3 = new PredicadoMinitermino($this->simples[$i],$this->simples[$j],false,true);
					$min4 = new PredicadoMinitermino($this->simples[$i],$this->simples[$j],false,false);
					if($min1->comprobarMinimalidad())
						{
							array_push($cumplen,$min1->getSQL());
						}
					if($min2->comprobarMinimalidad())
						{
							array_push($cumplen,$min2->getSQL());
						}
					if($min3->comprobarMinimalidad())
						{
							array_push($cumplen,$min3->getSQL());
						}
					if($min4->comprobarMinimalidad())
						{
							array_push($cumplen,$min4->getSQL());
						}
					if($this->hacerConsultaCompletitud($this->saberSQLConjuntoMinitermino($cumplen,$this->simples[$i]->getOrigen())))
						{
							$existe =0;
							for($k=0;$k<count($relacionesCompletas);$k++)
								{
									if($this->simples[$i]->getOrigen()==$relacionesCompletas[$k])
										{
											$existe = 1;
										}
								}
							if($existe==0)
								{
									array_push($relacionesCompletas,$this->simples[$i]->getOrigen());
								}
							array_push($this->miniterminos, $min1,$min2,$min3,$min4);
						}
				}}}
				return $relacionesCompletas;
			}
		function hacerConsultaCompletitud($SQL)
			{
				include('MQuetzalDB.php');
				$mysqli = new mysqli($servername, $username, $password, $database);
				$mysqli->query("SET NAMES 'utf8'");
				
				
				$result = $mysqli->query($SQL);
				
				$mysqli->close();
				while ($fila = $result->fetch_row()) {
					$tuplasNull = $fila[0];
				}
				if($tuplasNull==0)
					return true;	
				else
					return false;	
			}
		function saberSQLConjuntoMinitermino($cumplen,$origen)
			{
				$relacion = new Relacion($origen);
				$relacion -> setAtributos();
				$PKs = $relacion -> getPK();
				$PKCondicion = "";
				for($i=0; $i<count($PKs);$i++)
					{
						if($i==0)
							{
								$PKCondicion .= "  a.".$PKs[$i]->getNombre()." = b.".$PKs[$i]->getNombre()." ";
							}
						else
							{
								$PKCondicion .= "AND a.".$PKs[$i]->getNombre()." = b.".$PKs[$i]->getNombre()." ";
							}
					}
				$answer = false;
				$SQL = "select count(*) from (select * from ".$origen.") AS a LEFT JOIN";
				$SQL .= "(";
				for($i=0; $i<count($cumplen);$i++)
					{
						if($i==count($cumplen)-1)
							{
								$SQL .= "(";
								$SQL .= $cumplen[$i].")";
							}
						else
							{
								$SQL .= "(";
								$SQL .= $cumplen[$i].") UNION  ";
							}
								
					}
				$SQL .= ") AS b ON ";
				$SQL .= "".$PKCondicion." where b.".$PKs[0]->getNombre()." is NULL";
				return $SQL;
			}
		
		function comprobarCompletitud()
			{
				if(count($this->simples)<2)
					{
						return -2;
					}
				else if(!$this->almenosDosPorRelacion())
					{
						return -1;
					}
				else
					{
						$completas = $this->crearPredicadoMinitermino();
						$contempladas = $this->saberRelacionesContempladas();
						if(count($completas)==count($contempladas))
							{
								return 1;
							}
						else
							{
								return 0;
							}
						//return 1;
					}
			}
		function saberRelacionesContempladas()
			{
				$relaciones = array();
				for($i=0;$i<count($this->simples);$i++)
					{
						$existe =0;
						for($j=0;$j<count($relaciones);$j++)
							{
								if($this->simples[$i]->getOrigen()==$relaciones[$j])
									{
										$existe = 1;
									}
							}
						if($existe==0)
							{									
								array_push($relaciones,$this->simples[$i]->getOrigen());
							}
						
					}
				return $relaciones;
			}
		function almenosDosPorRelacion()
			{
				$cantidades = array();
				$relaciones = array();
				array_push($cantidades,1);
				array_push($relaciones,$this->simples[0]->getOrigen());
				for($i=1;$i<count($this->simples);$i++)
					{
						$existe =0;
						for($j=0;$j<count($relaciones);$j++)
							{
								if($this->simples[$i]->getOrigen()==$relaciones[$j])
									{
										$cantidades[$j] = $cantidades[$j]+1;
										$existe = 1;
									}
							}
						if($existe==0)
							{
								array_push($cantidades,1);										
								array_push($relaciones,$this->simples[$i]->getOrigen());
							}
						
					}
				for($i=0;$i<count($cantidades);$i++)
					{
						if($cantidades[$i] < 2)
							return false;
					}
				return true;
			}
	};

?>

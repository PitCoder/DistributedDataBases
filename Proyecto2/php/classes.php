<?php ini_set('display_errors','on');


	class Usuario{
	
		private $nombre;
		private $password;
		private $id;
		private $tipo;
		private $evento;
		
		//CONSTRUCTOR AND GETS
		
		function __construct( $name, $pass ) {
   			$this->nombre = $name;
   			$this->password = $pass;
		}
		
		function getId(){ return $this->id; }
		function getNombre(){ return $this->nombre; }
		function getTipo(){ return $this->tipo; }
		function getEventos(){ return $this->evento; }
		function getEvento($x){ return $this->evento[$x]; }
		function administrador(){ return $this->tipo=='Administrador'; }
		function gerente(){ return ($this->tipo=='gerente' || $this->tipo=='Gerente'); }
		
		// CLASS METHODS
		
		function esValido(){
			
			include('TAktuarDB.php');
			$mysqli = new mysqli($servername, $username, $password, $database);
			$mysqli->query("SET NAMES 'utf8'");
			
			$result = $mysqli->query(
				"SELECT iduser,nomUser,password,tipo FROM usuarios
				WHERE password='$this->password' AND nomUser='$this->nombre'"
			);
			
			$mysqli->close();
			
			if($result->num_rows==1){	
				$user = $result->fetch_assoc();
	   			$this->tipo = $user['tipo'];
	   			$this->id = $user['iduser'];
				return true;
				
			} else
				return false;
		}
		
		function setEventos(){
		    include('TAktuarDB.php');
			$mysqli = new mysqli($servername, $username, $password, $database);
			$mysqli->query("SET NAMES 'utf8'");
			
			if($this->administrador())
			    $sql = "SELECT id_obra FROM usuarios, obras
				WHERE usuarios_idUser=idUser";
			else
			    $sql = "SELECT id_obra FROM usuarios, obras
				WHERE usuarios_idUser='$this->id'
				AND usuarios_idUser=idUser";
				
			$result = $mysqli->query($sql);
			
			$mysqli->close();
		    
		    $this->evento = array();
		    $x=0;
			while($row = $result->fetch_assoc()) {
				$this->evento[]= new Evento($row['id_obra']);
				$this->evento[$x]->setValues(); // ADDED
				$x++; //ADDED
			}
		}
	};

	class Mueble{
	
		private $modelo;
		private $nombre;
		private $alto;
		private $ancho;
		private $profundidad;
		private $description;
		
		function __construct($id){
			$this->modelo = $id;
		}
		
		function getModelo(){ return $this->modelo; }
		function getNombre(){ return $this->nombre; }
		function getAlto(){ return $this->alto; }
		function getAncho(){ return $this->ancho; }
		function getProfun(){ return $this->profundidad; }
		function getDescrip(){ return $this->description; }
		function getCantidad(){return $this->cantidad;}
		
		function setValues(){

			include('MQuetzalDB.php');
			$mysqli = new mysqli($servername, $username, $password, $database);
			$mysqli->query("SET NAMES 'utf8'");

			$sql = "SELECT modelo, nombre, dimenAlto, dimenAncho, dimenProfun, descrip
				FROM Modelo
				WHERE modelo='$this->modelo'";

			$result = $mysqli->query($sql);
			$mysqli->close();
			
			if($result->num_rows==1){	
				$mod = $result->fetch_assoc();
	   			$this->nombre = $mod['nombre'];
	   			$this->alto = $mod['dimenAlto'];
	   			$this->ancho = $mod['dimenAncho'];
	   			$this->profundidad = $mod['dimenProfun'];
	   			$this->description = $mod['descrip'];
	   		//	$this->cantidad = $mod['cantidad'];
				return true;
				
			} else {
				$this->nombre = 'null';
				return false;
			}
		}
		function compararModelo($modeloA)
			{
				if($modeloA == $this->modelo)
					return true;
				else
					return false;
			}
		
	};
	
	class Evento{
		private $id;
		private $nombre; //deprecated by Obra
		private $fecha;
		private $hora;
		private $utileria = array();
		
		function __construct($id){
			$this->id = $id;
		}
		
		function getID(){ return $this->id; }
		function getNombre(){ return $this->nombre; }
		function getFecha(){ return $this->fecha; }
		function getHora(){ return $this->hora; }
		function getUtileria(){ return $this->utileria; }
		function getMueble($modelo){
		    for($i=0; $i<count($this->utileria); $i++){
				if($this->utileria[$i]->compararModelo($modelo))
					return $this->utileria[$i];
			}
				return null;
		}
		
		function setUtileria()
			{
				for($i=0;$i<count($this->utileria);$i++)
					{
						$this->utileria[$i]->setValues();
					}
			}
		
		function setValues(){
		    include('TAktuarDB.php');
			$mysqli = new mysqli($servername, $username, $password, $database);
			$mysqli->query("SET NAMES 'utf8'");
			
			$result = $mysqli->query(
				"SELECT nom_obra, fecha_obra, hora_obra FROM obras
				WHERE id_obra='$this->id'"
			);
			$mysqli->close();
			
			if($result->num_rows==1){	
				$user = $result->fetch_assoc();
	   			$this->nombre = $user['nom_obra'];
	   			$this->fecha = $user['fecha_obra'];
	   			$this->hora = $user['hora_obra'];
	   			
				return true;
				
			} else
				return false;
		}
		
		function setUtileriaDB(){
		    include('TAktuarDB.php');
			$mysqli = new mysqli($servername, $username, $password, $database);
			$mysqli->query("SET NAMES 'utf8'");
			
			$result = $mysqli->query(
				"SELECT Modelo,Cantidad FROM Mueble
				WHERE obras_id_obra='$this->id'"
			);
			
			$mysqli->close();
		
		    $this->utileria = array();
			while($row = $result->fetch_assoc()) {
				for($x=0;$x < $row['Cantidad']; $x++)
					$this->agregarMueble($row['Modelo']);
					//$this->utileria[$x]->setValues();
			}
			
			
		}
		
		function esValida(){
			include('TAktuarDB.php');
			$mysqli = new mysqli($servername, $username, $password, $database);
			$mysqli->query("SET NAMES 'utf8'");
			
			$result = $mysqli->query(
				"SELECT * FROM obras
				WHERE id_obra='$this->id'"
			);
			
			$mysqli->close();
			
			if($result->num_rows==1){	
				return true;
				
			} else
				return false;
			}
			
		function buscarEnUtileria($modelo)
			{
				for($i=0; $i<count($this->utileria); $i++)
					{
						if($this->utileria[$i]->compararModelo($modelo))
							return $i;
					}
				return -1;
			}
		function agregarMueble($modelo)
			{
				$mueble = new Mueble($modelo);
				array_push($this->utileria,$mueble);
			}
		function quitarMueble($modelo)
			{
				$posicion = $this->buscarEnUtileria($modelo);
				if($posicion>=0)
					{
						array_splice($this->utileria, $posicion, 1);
					}
			}
		function cuantosMuebles()
			{
				$nombres =  array();
				$modelos =  array();
				$cantidades =  array();
				
				//array_push($usados,$this->utileria[0]->getModelo());
				//array_push($arreglo,$this->utileria[0]->getModelo());
				$suma =0;
				$modelo = "";
				$nombre = "";
				while($suma<count($this->utileria))
					{						
						if($suma==0)
							{
								$modelo = $this->utileria[0]->getModelo();
								$nombre = $this->utileria[0]->getNombre();
							}
						else
							{
								for($i=0;$i<count($this->utileria); $i++)
									{
										$existe = 0;
										for($j=0;$j<count($modelos); $j++)
											{
												if($modelos[$j]==$this->utileria[$i]->getModelo())
													{
														$existe++;
														break;
													}
											}
										if($existe*1==0)
											{
												$modelo = $this->utileria[$i]->getModelo();
												$nombre = $this->utileria[$i]->getNombre();
												break;
											}
									}										
							}
						$cuantos=0;
						for($i=0; $i<count($this->utileria); $i++)
							{
								if($this->utileria[$i]->getModelo()==$modelo)
									{
										$cuantos++;
									}
							}
						array_push($modelos,$modelo);
						array_push($cantidades,$cuantos);
						array_push($nombres,$nombre);
						$suma = 0;
						for($i=0; $i<count($cantidades); $i++)
							{
								$suma = $suma + $cantidades[$i];
							}
					}
				$resultado = array();
				for($i=0; $i<count($modelos);$i++)
					{
						array_push($resultado,$modelos[$i],$nombres[$i],$cantidades[$i]);
					}
				return $resultado;
			}
		function cuantosMueblesDelModelo($modelo)
			{
				$cantidad =0;
				for($i=0;$i<count($this->utileria);$i++)
					{
						if($this->utileria[$i]->getModelo()==$modelo)
							{
								$cantidad++;
							}
					}
				return $cantidad;
			}
	};
	

	
?>

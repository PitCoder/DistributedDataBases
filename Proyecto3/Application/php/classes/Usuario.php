<?php 

	class Usuario{
	
		//private $nombre;
		private $id;
		private $tipo;
		
		//CONSTRUCTOR AND GETS
		
		function __construct( $id ) {
   			$this->id = $id;
		}
		
		function getId(){ return $this->id; }
		//function getNombre(){ return $this->nombre; }
		function getTipo(){ return $this->tipo; }
		function esAdministrador(){ return $this->tipo=='C'; }
		
		// CLASS METHODS
		
		function esValido($contrasena){
			
			include('MQuetzalDB.php');
			$mysqli = new mysqli($servername, $username, $password, $database);
			$mysqli->query("SET NAMES 'utf8'");
			
			$result = $mysqli->query(
				"SELECT id,nombre,tipo FROM UsuarioEmpresa
				WHERE password='$contrasena' AND id='$this->id'"
			);
			//echo "SELECT id,nombre,tipo FROM UsuarioEmpresa
			//	WHERE password='$contrasena' AND id='$this->id'";
			$mysqli->close();
			
			if($result->num_rows==1){	
				$user = $result->fetch_assoc();
	   			$this->id = $user['id'];
	   			//$this->nombre = $user['nombre'];
	   			$this->tipo = $user['tipo'];
				return true;
				
			} else
				return false;
		}
	};
	
?>

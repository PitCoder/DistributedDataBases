<?php 

	require_once('Relacion.php');

	class Sitio{

		private $direccion;	//String
//		private $nombre;	//String DEPRECATED
		private $contiene;	//Relacion array

		//CONSTRUCTOR AND GETS

		function __construct($sitio) {
			$this->direccion=$sitio;
		}



	};

?>

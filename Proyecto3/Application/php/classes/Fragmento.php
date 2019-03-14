<?php 

	class Fragmento{
	
		// DOUBT ABOUT ATTRIBUTES  !!! 
		private $id;			
		private $ubicacion;		//String sitio.name
					
		//CONSTRUCTOR AND GETS
		
		function __construct($id) {
			$this->id = $id;
			//$this->ubicacion = $sitio;
		}
		
		function getId(){ return $this->id; }
		
		
	};
	
?>

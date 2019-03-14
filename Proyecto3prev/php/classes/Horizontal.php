<?php 

	require_once('PredicadoMinitermino.php');
	require_once('Fragmento.php');

	class Horizontal extends Fragmento{

		private $tiene; 	//Predicado Minitermino

		//CONSTRUCTOR AND GETS

		function __construct($id,$mini) {
			parent::_construct($id);
			
			$this->tiene = $mini;
		}



	};

?>

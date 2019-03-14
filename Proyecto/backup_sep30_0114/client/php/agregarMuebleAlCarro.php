<?php ini_set('display_errors','on');


session_start();
$NuevoMueble = $_POST['Modelo'];

	if(count($_SESSION['carritoDan'])==0){

		$_SESSION['carritoDan'][] = (array( "mod" => $NuevoMueble, "num" => 1 ));
	}
	else{
		$existe=false;
		for($i=0; $i <count($_SESSION['carritoDan']); $i++){
	
			if($_SESSION['carritoDan'][$i]['mod']==$NuevoMueble){
				$existe=true;
			}
		}
	
		if(!$existe){
			$_SESSION['carritoDan'][] = (array( "mod" => $NuevoMueble, "num" => 1 ));
		}
	}

echo json_encode($_SESSION['carritoDan']);
?>
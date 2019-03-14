<?php ini_set('display_errors','on');
session_start();
foreach($_POST as $nombre_campo => $valor){
		$asignacion = "\$".$nombre_campo."='".trim($valor)."';";
		eval($asignacion);
	}


//$aux = $_SESSION['carritoDan'];
//unset($_SESSION['carritoDan']);
$newArt = array();
for($x = 0; $x < count($_SESSION['carritoDan']); $x++){
  if($_SESSION['carritoDan'][$x]['mod']==$id){}else{
     $newArt[] = $_SESSION['carritoDan'][$x];
  }
}
unset($_SESSION['carritoDan']);
$_SESSION['carritoDan'] = $newArt;
$res = "";
/*for($x = 0; $x < count($newArt); $x++){
 $res .= $newArt[$x].", ";
}*/
echo $res;
exit;
?>

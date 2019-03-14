<?php
session_start();
$can = $_POST["can"];
//$_SESSION['carritoDan'][] = ( array( "mod" => "H-0001", "num" => 10 ) );
for($i = 0; $i < count($_SESSION['carritoDan']); $i++){
  $_SESSION['carritoDan'][$i]['num']=$can[$i];
}
echo json_encode($_SESSION['carritoDan']);
exit;
?>
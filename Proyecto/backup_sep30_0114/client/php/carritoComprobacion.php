<?php ini_set('display_errors','on');
session_start();
$res = 0;
if($_SESSION['correo']=="null"){
  $res = 1;
}
echo $res;
exit;
?>
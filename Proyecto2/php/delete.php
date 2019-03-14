<?php
include('classes.php');
//echo phpinfo();
session_start();
echo json_encode($_SESSION)."<br>";
echo json_encode($_SESSION['user']->getNombre());
//echo json_encode($_SESSION['user']->getEvento(0)->getId());
?>
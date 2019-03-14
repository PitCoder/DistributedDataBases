<?php
include "PHPMailer/class.phpmailer.php";
include "PHPMailer/class.smtp.php";
include "passwords.php";

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

	
$the_subject = "Contacto";
$address_to = "$correo";
$from_name = "SGVI Quetzal";
$phpmailer = new PHPMailer();
// ---------- datos de la cuenta de Gmail -------------------------------
$phpmailer->Username = $usr;
$phpmailer->Password = $pass;
//-----------------------------------------------------------------------
// $phpmailer->SMTPDebug = 1;
$phpmailer->SMTPSecure = 'ssl';
$phpmailer->Host = "smtp.gmail.com"; // GMail
$phpmailer->Port = 465;
$phpmailer->IsSMTP(); // use SMTP
$phpmailer->SMTPAuth = true;
$phpmailer->setFrom($phpmailer->Username,$from_name);
$phpmailer->AddAddress($correo); // recipients email
$phpmailer->Subject = $the_subject;	
$phpmailer->Body .="<h1 style='color:#3498db;'>Gracias por contactarnos.</h1>";
$phpmailer->Body .= "<p>Buen día $nombre</p>";
$phpmailer->Body .= "<p>A la brevedad un agente de ventas se pondrá en contacto con usted</p>";
$phpmailer->Body .= "<p></p>";
$phpmailer->Body .= "<p>No responder a este mensaje</p>";
$phpmailer->Body .= "<h1>SGVI</h1>";
$phpmailer->IsHTML(true);
$phpmailer->Send();

$the_subject = "Solicitud de ayuda";
$address_to = "sgviquetzal@gmail.com";
$from_name = "$correo";
$phpmailer = new PHPMailer();
// ---------- datos de la cuenta de Gmail -------------------------------
$phpmailer->Username = $usr;
$phpmailer->Password = $pass;
//-----------------------------------------------------------------------
// $phpmailer->SMTPDebug = 1;
$phpmailer->SMTPSecure = 'ssl';
$phpmailer->Host = "smtp.gmail.com"; // GMail
$phpmailer->Port = 465;
$phpmailer->IsSMTP(); // use SMTP
$phpmailer->SMTPAuth = true;
$phpmailer->setFrom($phpmailer->Username,$from_name);
$phpmailer->AddAddress("sgviquetzal@gmail.com"); // recipients email
$phpmailer->Subject = $the_subject;	
$phpmailer->Body .="<h1 style='color:#3498db;'>El cliente: $nombre.</h1>";
$phpmailer->Body .= "<p>A dejado el siguiente mensaje: </p>";

$phpmailer->Body .= "<p><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$mensaje</i></p>";
$phpmailer->Body .= "<p>-------------------------------- </p>";
$phpmailer->Body .= "<p>Contacto:  </p>";

$phpmailer->Body .= "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Correo: $correo </p>";
$phpmailer->Body .= "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telefono: $telefono </p>";
$phpmailer->Body .= "<p>-------------------------------- </p>";
$phpmailer->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
$phpmailer->Body .= "<h1>SGVI</h1>";
$phpmailer->IsHTML(true);
$phpmailer->Send();
echo $address_to;
?>

<script>
  window.top.close();
</script>

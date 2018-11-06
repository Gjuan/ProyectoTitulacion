<?php
ini_set('display_errors',1);
require("views/email/PHPMailer/class.phpmailer.php");
require("views/email/PHPMailer/class.smtp.php");

function sendgmail($correo,$nombre,$body)
{
	$mail = new PHPMailer();

$body = $body;


$mail->IsSMTP(); 

/* Sustituye (ServidorDeCorreoSMTP)  por el host de tu servidor de correo SMTP*/
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;//puerto a utilizar
$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl"; 
		$mail->SMTPDebug = 1; 
/* Sustituye  ( CuentaDeEnvio )  por la cuenta desde la que deseas enviar por ejem. prueba@domitienda.com  */

$mail->From = "juangabrielestrada1994@gmail.com";

$mail->FromName = $nombre;

$mail->Subject = "Correo Informativo";

$mail->AltBody = "prueba"; 

$mail->MsgHTML($body,$mensaje);

/* Sustituye  (CuentaDestino )  por la cuenta a la que deseas enviar por ejem. admin@domitienda.com  */
$mail->AddAddress($correo,'');

$mail->SMTPAuth = true;


/* Sustituye (CuentaDeEnvio )  por la misma cuenta que usaste en la parte superior en este caso  prueba@domitienda.com  y sustituye (ContraseñaDeEnvio)  por la contraseña que tenga dicha cuenta */

$mail->Username = "juangabrielestrada1994@gmail.com";
$mail->Password = "Jg2e1994"; 
//$mail->AddAttachment("views/images/escudoNaves.jpg", "");-- sirve para adjuntar una imagen 
	


if(!$mail->Send()) {
//echo "Mailer Error: " . $mail->ErrorInfo;
} else {
//echo "Message sent!";
}
}
//sendgmail($_POST['correo'],$_POST['nombre'],$_POST['descripcion']);
 //header("location: inicio.php"); 

?>
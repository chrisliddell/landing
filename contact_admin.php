<?php

$username = 'info@cueropapelytijera.com';
$password = 'Cuero@1324';
$from = 'info@cueropapelytijera.com';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';


//CPT
if( $_SERVER['REQUEST_METHOD'] === 'POST' ){

	//datos del cupon
	$nombre = $_POST['nombre-completo'];	
	$empresa = $_POST['empresa'];
	$productos = $_POST['productos'];
	$info = $_POST['adicional'];	
	$tel = $_POST['telefono'];
	$correo = $_POST['correo'];
	

    $datos = "nombre: " . $nombre.", <br>tel: ".$tel.", <br>correo: ".$correo.", <br>empresa: ".$empresa.", <br>productos: ".$productos.", <br>datos adicionales: ".$info."\n";
	/** RESPALDO DE EMAIL 
	$req_dump = print_r($datos, TRUE);
	$fp = fopen('email.log', 'a+');
	fwrite($fp, "\n".$req_dump."\n");
	fclose($fp);
	**/

    $mail = new PHPMailer;
	$mail = new PHPMailer;	
	$mail ->isSMTP();
	$mail ->CharSet = 'UTF-8';
	$mail ->Encoding = 'base64';
	$mail ->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;     

	$mail ->SMTPDebug  = 3;


	$mail->Username = $username;

	$mail->Password = $password;

	$mail->SMTPSecure = 'tls';     

	$mail->Port = 25; 

	$mail->setFrom($from);

	$mail->addAddress('administrativo@cueropapelytijera.com');

	$mail ->addBcc('smatamoros@imagineercx.com'); 

	$mail->isHTML(true);

	$mail->Body = $datos;

	$mail->Subject = "Regalos cueropapel&tijera para tu empresa";

	if(!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo; 

	} else {
		echo "Message sent!";

	}

}
?>

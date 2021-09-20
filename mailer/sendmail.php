<?php
$name = isset($_POST['name']) ? $_POST['name'] : "-";
$email = isset($_POST['email']) ? $_POST['email'] : "-";
$servicio = isset($_POST['servicio']) ? $_POST['servicio'] : "-";
$message2 = isset($_POST['message2']) ? $_POST['message2'] : "-";

	$fecha = date("Y/m/d");
	$sender = "SB Group | Contacto";
	
	$message = "----------\n<br/> Fecha: $fecha \n<br/> Enviado desde: $sender\n<br/> Nombre: $name \n<br/> Email: $email \n<br/> Segmento de interes: $servicio \n<br/> Mensaje: $message2 \n<br/> \n\n";
	$Support_mail = "sales@sbgroup.com.mx";
	
	require_once('class.phpmailer.php');
	include("class.smtp.php"); //Optional, gets called from within class.phpmailer.php if not already loaded
	
	$mail = new PHPMailer();
	$body = $message;
	$subject = "SB Group | Contacto";
	
	//Gmail
	$mail->IsSMTP(); //Telling the class to use SMTP
	$mail->SMTPDebug = 1; //Enables SMTP debug information (for testing), 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = "smtp.gmail.com"; //Enable SMTP authentication
	$mail->SMTPSecure = "ssl"; //Protocol
	$mail->Host = "smtp.gmail.com"; //Sets the SMTP server
	$mail->Port = 465; //Set the SMTP port for the gmail server
	$mail->IsHTML(true);
	$mail->Username = "pruebaslumston@gmail.com"; //SMTP account username
	$mail->Password = "Jarrito2020"; //SMTP account password
	$mail->SetFrom("pruebaslumston@gmail.com", "SB Group | Contacto");
	$mail->From = "pruebaslumston@gmail.com";
	$mail->AddReplyTo($email);
	$mail->Subject = $subject;
	$mail->AltBody = $subject; //Optional, comment out and test
	$mail->MsgHTML($message);
	//$mail->AddAddress($email); //Send a copy to the sender
	
	//mail to Support
	$mail->AddAddress($Support_mail, "SB Group | Contacto");
	
	$res = $mail->Send();
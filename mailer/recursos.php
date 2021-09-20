<?php
header('Access-Control-Allow-Origin: *'); 
$name = isset($_POST['name']) ? $_POST['name'] : "Enter your name.";
$email = isset($_POST['email']) ? $_POST['email'] : "Enter a valid email.";

	
	$fecha = date("Y/m/d");
	$sender = "SB Group | Recursos";
	
	$message = "----------\n<br/> Date: $fecha \n<br/> Sent from: $sender\n<br/> Nombre: $name \n<br/> Email: $email \n<br/> \n\n";
	
	$Support_mail = "sales@sbgroup.com.mx";
	
	require_once('class.phpmailer.php');
	include("class.smtp.php"); //Optional, gets called from within class.phpmailer.php if not already loaded
	
	$mail = new PHPMailer();
	$body = $message;
	$subject = "SB Group | Recursos";
	
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
	$mail->SetFrom("pruebaslumston@gmail.com", "SB Group | Recursos");
	$mail->From = "pruebaslumston@gmail.com";
	$mail->AddReplyTo($email);
	$mail->Subject = $subject;
	$mail->AltBody = $subject; //Optional, comment out and test
	$mail->MsgHTML($message);
	//$mail->AddAddress($email); //Send a copy to the sender
	
	//mail to Support
	$mail->AddAddress($Support_mail, "SB Group | Recursos");
	
	$res = $mail->Send();


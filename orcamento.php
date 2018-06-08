<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'global.php';
$obj = new ConfigGlobal;

if(isset($_POST)){
	
	$mail = new PHPMailer(true);
	try {
		
		//Server settings
		$mail->SMTPDebug  = $obj->getDbug();
		$mail->isSMTP();
		$mail->Host       = "{$obj->getHost()}.hostgator.com.br";
		$mail->SMTPAuth   = $obj->getSmtpAuth();
		$mail->Username   = $obj->getUserName();
		$mail->Password   = $obj->getPassword();
		$mail->SMTPSecure = $obj->getSmtpSecure();
		$mail->Port       = $obj->getPort();

		//Recipients
		$mail->setFrom   ($emails[0]['email'], $emails[0]['nome']);
		$mail->addAddress($emails[1]['email'], $emails[1]['nome']);
		$mail->addAddress($emails[2]['email'], $emails[2]['nome']);

		//Content
		$mail->isHTML(true);
		$mail->Subject = utf8_decode('Orçamento #'.date('Ymd'));
		$mail->Body    = "<p>Nome    : <b>". utf8_decode($_POST['name'    ]) ."</b></p>" .
				 "<p>e-mail  : <b>". utf8_decode($_POST['email'   ]) ."</b></p>" .
				 "<p>telefone: <b>". utf8_decode($_POST['telefone']) ."</b></p>" .
				 "<p>mensagem: <b>". utf8_decode($_POST['message' ]) ."</b></p>" .
		                 "";

		$mail->send();
		echo true;
	} catch (Exception $e) {
		echo false;
	}
	
}
?>
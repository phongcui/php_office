<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
require "lib/PHPMailer/src/Exception.php";
require '/lib/PHPMailer/src/PHPMailer.php';
require '/lib/PHPMailer/src/SMTP.php';








class sendMail extends PHPMailer{

    public function ghiDai($email = ''){


	$mail = new PHPMailer(true);



	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'jshviethoang@gmail.com'; 
	$mail->Password = 'ygagreadogoyeeqb'; 
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	
	
	$mail->setFrom('jshviethoang@gmail.com', 'Mailtrap');
	$mail->addReplyTo('phongcu1000@gmail.com', 'Mailtrap');
	$mail->addAddress('phong.penguin@gmail.com', 'Tim'); 
	$mail->Subject = 'phong gui mail';
	$mail->isHTML(true);
	$mailContent = "<h1>Send HTML Email using SMTP in PHP</h1>
		<p>This is a test email I’m sending using SMTP mail server with PHPMailer.</p>";
    $mail->Body = $mailContent;
    
    $result = $mail->send();

    return $result;

    }
}


?>
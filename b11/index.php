<!DOCTYPE html>
<html lang="en">

<head>
	<title>Contact V7</title>
	<?php require_once("./data/head.php") ?>
	<?php require_once("./data/Validate.class.php") ?>
	<?php /*require_once("./data/add.php") */ ?>



</head>

<body>

	<?php

	// use PHPMailer\PHPMailer\PHPMailer;
	// use PHPMailer\PHPMailer\Exception;

	// require './lib/PHPMailer/src/Exception.php';
	// require './lib/PHPMailer/src/PHPMailer.php';
	// require './lib/PHPMailer/src/SMTP.php';

	// $mail = new PHPMailer(true);

	// echo '<pre>';
	// print_r($mail);
	// echo '</pre>';

	// $mail->isSMTP();
	// $mail->Host = 'SMTP.office365.com';
	// $mail->SMTPAuth = true;
	// $mail->Username = 'phongdht@mkaplus.com'; 
	// $mail->Password = '1091996@Micro1'; 
	// $mail->SMTPSecure = 'tls';
	// $mail->Port = 587;
	
	
	// $mail->setFrom('phongdht@mkaplus.com', 'Mailtrap');
	// $mail->addReplyTo('phongcu1000@gmail.com', 'Mailtrap');
	// $mail->addAddress('nvlinh17041992@gmail.com', 'Tim'); 
	// $mail->Subject = 'phong gui mail';
	// $mail->isHTML(true);
	// $mailContent = "<h1>Send HTML Email using SMTP in PHP</h1>
	// 	<p>This is a test email I’m sending using SMTP mail server with PHPMailer.</p>";
	// $mail->Body = $mailContent;
	
	// if($mail->send()){
	// 	echo 'Message has been sent';
	// }else{
	// 	echo 'Message could not be sent.';
	// 	echo 'Mailer Error: ' . $mail->ErrorInfo;
	// }


	// $result = [];
	// $errors = '';
	// if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
	// 	$source = $_POST;
	// 	$validate = new Validate($source);

	// 	// Rule
	// 	$validate->addRule('name', 'string', 5, 100)
	// 		// 				 ->addRule('age', 'int', 1, 90)
	// 		->addRule('email', 'email')
	// 		->addRule('message', 'string', 5, 100);

	// 	// Run
	// 	$validate->run();
	// 	$errors = $validate->showErrors();
	// 	$result = $validate->getResult();
	// }

		// require_once('./data/function/sendMail.php');

		//  $mail3 = new sendMail;
		// $mail3->ghiDai();
		 $a = 'asdfghjkl;';
		var_dump($a);
		die();



	?>



	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="#" method="post">
				<span class="contact100-form-title ">
					Get in Touch
					<div class="alert alert-primary">
						<?php echo $errors ?>
					</div>

				</span>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<input class="input100" id="name" type="text" name="name" placeholder="Name" value="<?php echo $result['name'] ?>">
					<label class="label-input100" for="name">
						<span class="lnr lnr-user"></span>
					</label>
				</div>

				<div class="wrap-input100 validate-input">
					<input class="input100" id="email" type="text" name="email" placeholder="Email">
					<label class="label-input100" for="email">
						<span class="lnr lnr-envelope"></span>
					</label>
				</div>



				<div class="wrap-input100 validate-input" data-validate="Message is required">
					<textarea class="input100" name="message" placeholder="Your message..."></textarea>
				</div>

				<div class="contact100-form-checkbox">
					<input class="input-checkbox100" id="ckb1" type="checkbox" name="copy-mail">
					<label class="label-checkbox100" for="ckb1">
						Send copy to my-email
					</label>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							Send Email
						</button>
					</div>
				</div>
			</form>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125638.62400552443!2d105.57622932836541!3d10.244882457351476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a7919960bb19f%3A0xbb67111fb8b32163!2zTGFpIFZ1bmcsIMSQ4buTbmcgVGjDoXAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1598015070399!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

	<?php /* require_once('./data/script.php'); */ ?>

</body>

</html>
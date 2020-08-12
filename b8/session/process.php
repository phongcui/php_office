<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Process</title>
</head>

<body>
	<div id="wrapper">
		<div class="title">PROCESS</div>
		<div id="form">
			<?php
			require_once 'functions.php';
			session_start();

			$xml = simplexml_load_file("./data/timeout.xml") or die("Error: Cannot create object");
			$timeout = $xml->timeout;









			if ($_SESSION['flagPermission'] == true) {
				if ($_SESSION['timeout'] + $timeout > time()) {
					echo '<h3>Xin chào: ' . $_SESSION['fullName'] . '</h3>';
					echo '<a href="logout.php">Đăng xuất</a>';
				} else {
					session_unset();
					header('location: login.php');
				}
			} else {
				if (!checkEmpty($_POST['username']) && !checkEmpty($_POST['password'])) {
					$username 	= $_POST['username'];
					$password 	= md5($_POST['password']);
					$data 		= file_get_contents('./users.json');
					$data 	= json_decode($data, true);
					foreach ($data as $thongTin) {
						if ($thongTin['username'] == $username && $thongTin['password'] == $password) {

							$_SESSION['fullName'] 		= $thongTin['fullname'];
							$_SESSION['flagPermission'] = true;
							$_SESSION['timeout'] 		= time();
							// $_SESSION['role'] 			= $thongTin['role'];

							if ($thongTin['role'] == 'admin') {
								header('location: admin.php');
								exit();
							} else {
								header('location: member.php');
								exit();
							}
						} else {
							header('location: login.php');
							exit();
						}
					}
				} else {
					header('location: login.php');
					exit();
				}
			}
			?>
		</div>

	</div>
</body>

</html>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>PHP FILE - ADD</title>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#cancel-button').click(function() {
				window.location = 'index.php';
			});
		});
	</script>
</head>

<body>
	<?php
	require_once 'functions.php';
	require_once 'define.php';

	require_once 'function-upload.php';
	$errorTitle = '';
	$errorDescription = '';
	$title = '';
	$description = '';
	$errorImg = '';




	$flag	= false;
	if (isset($_POST['title']) && isset($_POST['description']) && isset($_FILES['file-avatar'])) {
		$title			= $_POST['title'];
		$description	= $_POST['description'];

		// Error Title

		if (checkEmpty($title)) 			$errorTitle = '<p class="error">Dữ liệu không được rỗng</p>';
		if (checkLength($title, 3, 10)) $errorTitle .= '<p class="error">Tiêu đề dài từ 3 đến 10 ký tự</p>';

		// Error Description

		if (checkEmpty($description)) 			$errorDescription = '<p class="error">Dữ liệu không được rỗng</p>';
		if (checkLength($description, 10, 5000)) $errorDescription .= '<p class="error">Nội dung dài từ 10 đến 5000 ký tự</p>';

		// file upload 
		$configs = parse_ini_file('config.ini');

		$fileUpload = $_FILES['file-avatar'];

		if (!$fileUpload['name'] == '') {
			$fileName = ramdomName($fileUpload['name'], 7);



			$flagSize = checkSizeFile($fileUpload['size'], $configs['min_size'], $configs['max_size']);

			$flagExtension = checkExtensionFile($fileUpload['name'], explode('|', $configs['extension']));

			// $flagExtension == false;


		} else {
			$errorImg .= 'ban can nhap hinh vao';
		}

		// A-Z, a-z, 0-9: AzG09
		if ($errorTitle == '' && $errorDescription == '' && $errorImg == '') {
			$data	= $title . '||' . $description . '||' . FOLDER_DATA . '/' . $fileName;

			$name = 'zendvn-' . randomString(6);
			$filename	= FOLDER_DATA . '/' . $name . '.txt';
			if (file_put_contents($filename, $data)) {
				$title			= '';
				$description	= '';
				$nameImg;
				$flag			= true;
			}

			if ($flagSize == true && $flagExtension == true) {
				@move_uploaded_file($fileUpload['tmp_name'], './data/' . $fileName);
				$errorImg .= 'upload thanh cong';
			} else {
				$errorImg .= 'upload khong thanh cong';
			}
		}
	}











	?>
	<div id="wrapper">
		<div class="title">PHP FILE - ADD</div>
		<div id="form">
			<form action="#" method="post" name="add-form" id="add-form" enctype="multipart/form-data">
				<div class="row">
					<p>Title</p>
					<input type="text" name="title" value="<?php echo $title; ?>">
					<?php echo $errorTitle; ?>
				</div>

				<div class="row">
					<p>Description</p>
					<textarea name="description" rows="5" cols="100"><?php echo $description; ?></textarea>
					<?php echo $errorDescription ?>
				</div>

				<div class="row">
					<input type="file" name="file-avatar" />
					<p><?php echo $errorImg ?></p>



				</div>

				<div class="row">
					<input type="submit" value="Save" name="submit">
					<input type="button" value="Cancel" name="cancel" id="cancel-button">
				</div>

				<?php
				if ($flag == true) echo '<div class="row"><p>Dữ liệu đã được ghi thành công!</p></div>';
				?>

			</form>
		</div>

	</div>
</body>

</html>
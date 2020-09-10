<?php
error_reporting(E_ALL & ~E_NOTICE);
require_once 'class/Validate.class.php';
require_once 'class/HTML.class.php';
require_once 'connect.php';
session_start();

$error 			= '';
$outValidate	= [];
$id				= $_GET['id'];
$action			= $_GET['action'];
$flagRedirect	= false;
$titlePage		= '';

if ($action == 'edit') {
	$id = mysqli_real_escape_string($database->getConnect(), $id);
	$query = "SELECT `name`, `status`, `ordering`, `group_default` FROM `group` WHERE id = '" . $id . "'";
	$outValidate	= $database->singleRecord($query);
	$linkForm		= 'form.php?action=edit&id=' . $id;
	if (empty($outValidate)) $flagRedirect	= true;
	$titlePage		= 'EDIT GROUP';
} else if ($action == 'add') {
	$linkForm		= 'form.php?action=add';
	$titlePage		= 'ADD GROUP';
} else {
	$flagRedirect	= true;
}

// Redirect page
if ($flagRedirect == true) {
	header('location: error.php');
	exit();
}

if (!empty($_POST)) {
	if ($_SESSION['token'] == $_POST['token']) { // refresh page
		unset($_SESSION['token']);
		header('location: ' . $linkForm);
		exit();
	} else {
		$_SESSION['token'] = $_POST['token'];
	}

	$source   = ['name' => $_POST['name'], 'status' => $_POST['status'], 'ordering' => $_POST['ordering'], 'group_default' => $_POST['group_default']];
	$validate = new Validate($source);
	$validate->addRule('name', 'string', 2, 50)
		->addRule('ordering', 'int', 1, 10)
		->addRule('status', 'status')
		->addRule('group_default', 'group-default');

	$validate->run();

	$outValidate = $validate->getResult();

	if (!$validate->isValid()) {
		$error = $validate->showErrors();
	} else {
		if ($action == 'edit') {
			$where = [['id', $id]];
			$database->update($outValidate, $where);
		} else if ($action == 'add') {
			$database->insert($outValidate);
			$outValidate = [];
		}
		$success = '<div class="success">Success</div>';
	}
}

// Input
$inputName 			= HTML::createInput('text', 'name', '', $outValidate['name']);
$arrStatus 			= [2 => 'Select status', 0 => 'Inactive', 1 => 'Active'];
$status				= HTML::createSelectbox($arrStatus, 'status', $outValidate['status']);
$arrGroupDefault	= [2 => 'Select group default', 0 => 'No', 1 => 'Yes'];
$groupDefault		= HTML::createSelectbox($arrGroupDefault, 'group_default', $outValidate['group_default']);
$inputOrdering 		= HTML::createInput('text', 'ordering', '', $outValidate['ordering']);
$inputSave			= HTML::createInput('submit', 'submit', '', 'Save');
$inputCancel		= HTML::createInput('button', 'cancel', 'cancel-button', 'Cancel');
$inputToken			= HTML::createInput('hidden', 'token', '', time());

// Row
$rowName			= HTML::createFromRow('Name', $inputName);
$rowStatus 			= HTML::createFromRow('Status', $status);
$rowGroupDefault	= HTML::createFromRow('Group Default', $groupDefault);
$rowOrdering 		= HTML::createFromRow('Ordering', $inputOrdering);
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title><?php echo $titlePage; ?></title>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/my-js.js"></script>
</head>

<body>
	<div id="wrapper">
		<div class="title"><?php echo $titlePage; ?></div>
		<div id="form">
			<?php echo $error . $success; ?>
			<form action="<?php echo $linkForm; ?>" method="post" name="add-form">
				<?php echo $rowName . $rowStatus . $rowGroupDefault . $rowOrdering ?>

				<div class="row">
					<?php echo $inputSave . $inputCancel . $inputToken ?>
				</div>
			</form>
		</div>

	</div>
</body>

</html>
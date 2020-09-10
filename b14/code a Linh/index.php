<?php
error_reporting(E_ALL & ~E_NOTICE);
require_once 'connect.php';
require_once 'class/Helper.class.php';
require_once 'class/HTML.class.php';
session_start();
// MULTY DELETE

$messageDelete = '';
$searchValue = $_GET['search'] ?? '';
$arrStatus 	= ['default' => 'Select status', 0 => 'Inactive', 1 => 'Active'];
$sblStatus	= HTML::createSelectbox($arrStatus, 'status', $_GET['status'], null, 'padding: 5px; width: 150px');
if (isset($_POST['token'])) {
	if ($_SESSION['token'] == $_POST['token']) { // refresh page
		unset($_SESSION['token']);
		header('location: ' . $_SERVER['PHP_SELF']);
		exit();
	} else {
		$_SESSION['token'] = $_POST['token'];
	}
	$checkbox	= $_POST['checkbox'];
	if (!empty($checkbox)) {
		$total = $database->delete($checkbox);
		$messageDelete = '<div class="success">Có ' . $total . ' dòng được xóa!</div>';
	} else {
		$messageDelete = '<div class="notice">Bạn vui lòng chọn vào các dòng muốn xóa!</div>';
	}
}

$query[] 	= "SELECT `g`.`id`,`g`.`name`,`g`.`status`,`g`.`ordering`, `g`.`group_default`, COUNT(`u`.`id`) AS total";
$query[] 	= "FROM `group` AS `g` LEFT JOIN `user` AS `u` ON `g`.`id` = `u`.`group_id`";

if ($searchValue != '') $query[] = "WHERE `g`.`name` LIKE '%$searchValue%'";
if (isset($_GET['status']) && $_GET['status'] != 'default') $query[] = "WHERE `g`.`status` = " . $_GET['status'];

$query[] 	= "GROUP BY `g`.`id`";
$query		= implode(" ", $query);

$list		= $database->listRecord($query);

$xhtml = '';
if (!empty($list)) {
	$i = 0;
	foreach ($list as $item) {
		$row			= ($i % 2 == 0) ? 'odd' : 'even';
		$id				= $item['id'];
		$name			= Helper::highLight($item['name'], $searchValue);
		$status			= ($item['status'] == 0) ? 'Inactive' : 'Active';
		$groupDefault	= ($item['group_default'] == 0) ? 'No' : 'Yes';
		$xhtml .= '
		<div class="row ' . $row . '">
			<p class="no"><input type="checkbox" name="checkbox[]" value="' . $id . '"></p>
			<p class="name">' . $name . '</p>
			<p class="id">' . $id . '</p>
			<p class="size">' . $status . '</p>
			<p class="size">' . $groupDefault . '</p>
			<p class="size">' . $item['ordering'] . '</p>
			<p class="size">' . $item['total'] . '</p>
			<p class="action">
				<a href="form.php?action=edit&id=' . $id . '">Edit</a> |
				<a href="delete.php?id=' . $id . '">Delete</a>
			</p>
		</div>';
		$i++;
	}
} else {
	$xhtml = '<div class="success">Dữ liệu đang cập nhật';
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Manage Group</title>
	
</head>

<body>
	<div id="wrapper">
		<div class="title">Manage Group</div>
		<div class="list">
			<?php echo $messageDelete; ?>
			<div id="search-filter-area">
				<form action="" method="get" id="search-form">
					<input type="text" name="search" value="<?= $searchValue ?>">
					<button type="button" id="btn-clear-search">Clear</button>
					<button type="submit">Search</button>
				</form>
				<form action="" method="get" id="filter-form">
					<?php echo $sblStatus ?>
				</form>
			</div>
			<form action="#" method="post" name="main-form" id="main-form">
				<div class="row" style="text-align: center; font-weight: bold;">
					<p class="no"><input type="checkbox" name="check-all" id="check-all" /></p>
					<p class="name">Group Name</p>
					<p class="id">ID</p>
					<p class="size">Status</p>
					<p class="size">Group Default</p>
					<p class="size">Ordering</p>
					<p class="size">Members</p>
					<p class="action">Action</p>
				</div>
				<input type="hidden" value="<?php echo time(); ?>" name="token" />
				<?php echo $xhtml; ?>
			</form>
		</div>
		<div id="area-button">
			<a href="form.php?action=add">Add Group</a>
			<a id="multy-delete" href="#">Delete Group</a>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/my-js.js"></script>
</body>

</html>
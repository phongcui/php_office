<?php
	require_once 'connect.php';
	require_once './class/Helper.class.php';
	session_start();
	
	// MULTY DELETE
	$valueInput = $_GET['search'] ?? '';
	$messageDelete = '';
	if(isset($_POST['token'])){
		if($_SESSION['token'] == $_POST['token']){ // refresh page
			unset($_SESSION['token']);
			header('location: ' . $_SERVER['PHP_SELF']);
			exit();
		}else{
			$_SESSION['token'] = $_POST['token'];
		}
		$checkbox	= $_POST['checkbox'];
		if(!empty($checkbox)){
			$total = $database->delete($checkbox);
			$messageDelete = '<div class="success">Có '.$total.' dòng được xóa!</div>';
		}else{
			$messageDelete = '<div class="notice">Bạn vui lòng chọn vào các dòng muốn xóa!</div>';
		}
	}
	
	$query[] 	= "SELECT `u`.`id`, CONCAT(`u`.`firstname`, ' ', `u`.`lastname`) AS fullname,`u`.`username`, `u`.`email`, `u`.`birthday`,`u`.`status`,`u`.`ordering`, `g`.`name` AS groupname";
	$query[] 	= "FROM `user` AS `u` LEFT JOIN `group` AS `g` ON `g`.`id` = `u`.`group_id`";
	if($valueInput!='')$query[]="WHERE `u`.`username` LIKE '%$valueInput%'";
	$query		= implode(" ", $query);
	
	$list		= $database->listRecord($query);
	
	if(!empty($list)){
		$i = 0;
		foreach($list as $item){
			$row	= ($i % 2 == 0) ? 'odd' : 'even';
			$id		= $item['id'];
			$status	= ($item['status']==0) ? 'Inactive' : 'Active';
			$replace = Helper::highLight($item['name'], $valueInput);
			$xhtml .= '<div class="row '.$row.'">
			            	<p class="no"><input type="checkbox" name="checkbox[]" value="'.$id.'"></p>
			                <p class="name">'.$item['username'].'
			                	<span>'.$item['fullname']. ' - ' .$item['email'].'</span>
			                </p>
			                <p class="id">'.$id.'</p>
			                <p class="id">'.date("d-m-Y",strtotime($item['birthday'])).'</p>
			                <p class="size">'.$status.'</p>
			                <p class="size">'.$item['ordering'].'</p>
			                <p class="size">'.$item['groupname'].'</p>
			                <p class="action">
			                	<a href="form.php?action=edit&id='.$id.'">Edit</a> |
	                			<a href="delete.php?id='.$id.'">Delete</a>
			                </p>
			            </div>';	
			$i++;
		}
	}else{
		$xhtml = '<div class="success">Dữ liệu đang cập nhật';
	}
	
	

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Manage User</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/my-js.js"></script>
</head>
<body>
	<div id="wrapper">
    	<div class="title">Manage User</div>
		<form action="#" method="get">
			<input name="search" value="<?php echo $valueInput ?>">
			<button tyle="clear" id="clear">Clear</button>
			<button tyle="submit">Submit</button>


		</form>
        <div class="list">  
        	<?php echo $messageDelete;?> 
			<form action="#" method="post" name="main-form" id="main-form">
	         	<div class="row" style="text-align: center; font-weight: bold;">
	            	<p class="no"><input type="checkbox" name="check-all" id="check-all" /></p>
	                <p class="name">User Name</p>
	                <p class="id">ID</p>
	                <p class="id">Birthday</p>
	                <p class="size">Status</p>
	                <p class="size">Ordering</p>
	                <p class="size">Group</p>
	                <p class="action">Action</p>
	            </div>
	            <input type="hidden" value="<?php echo time();?>" name="token" />
	         	<?php echo $xhtml;?>
	    	</form>
    	</div>
        <div id="area-button">
        	<a href="form.php?action=add">Add User</a>
        	<a id="multy-delete" href="#">Delete User</a>
        </div>
    </div>
</body>
</html>

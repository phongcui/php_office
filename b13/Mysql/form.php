<?php
	require_once 'class/Validate.class.php'; 
	require_once 'class/HTML.class.php'; 
	require_once 'connect.php'; 
	session_start();
	
	$error 			= '';
	$outValidate	= array();
	$id				= $_GET['id'];
	$action			= $_GET['action'];
	$flagRedirect	= false;
	$titlePage		= '';
	
	if($action == 'edit'){
		$id = mysqli_real_escape_string($id);
		$query = "SELECT `name`, `status`, `ordering` FROM `group` WHERE id = '" . $id . "'";
		$outValidate	= $database->singleRecord($query);
		$linkForm		= 'form.php?action=edit&id=' . $id;
		if(empty($outValidate)) $flagRedirect	= true;		
		$titlePage		= 'EDIT GROUP';
	}else if($action == 'add'){
		$linkForm		= 'form.php?action=add';
		$titlePage		= 'ADD GROUP';
	}else{
		$flagRedirect	= true;
	}
	
	// Redirect page
	if($flagRedirect == true) {
		header('location: error.php');
		exit();
	}
	
	if(!empty($_POST)){
		if($_SESSION['token'] == $_POST['token']){ // refresh page
			unset($_SESSION['token']);
			header('location: ' . $linkForm);
			exit();
		}else{
			$_SESSION['token'] = $_POST['token'];
		}
		
		$source   = array('name' => $_POST['name'], 'status'=> $_POST['status'], 'ordering'=> $_POST['ordering']);
		$validate = new Validate($source);
		$validate->addRule('name', 'string', 2, 50)
				 ->addRule('ordering', 'int', 1, 10)
				 ->addRule('status', 'status');
		
		$validate->run();

		$outValidate = $validate->getResult();
		
		if(!$validate->isValid()){
			$error = $validate->showErrors();
		}else{
			if($action == 'edit'){
				$where = array(array('id', $id));
				$database->update($outValidate, $where);
			}else if($action == 'add'){
				$database->insert($outValidate);
				$outValidate = array();
			}
			
			
			$success = '<div class="success">Success</div>'; 
		}
	}
	
	$arrStatus 	= array(2=> 'Select status', 0 => 'Inactive', 1 => 'Active');
	$status		= HTML::createSelectbox($arrStatus, 'status', $outValidate['status']);
	$arrGroupDefault = [2=> 'Select group default', 0 => 'No', 1 => 'Yes'];
	$groupDefault = HTML::createSelectbox($arrGroupDefault, 'group_default', $outValidate['group_default']);


	$inputName = HTML::createInput('text','name','name',$outValidate['name']);
	$inputOrdering = HTML::createInput('text','ordering','ordering',$outValidate['ordering']);
	$inputSave = HTML::createInput('button','save','save',$outValidate['save']);
	$inputCancle = HTML::createInput('button','cancle','cancle',$outValidate['cancle']);


	$createRow = HTML::createRow() 


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title><?php echo $titlePage;?></title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/my-js.js"></script>
</head>
<body>
	<div id="wrapper">
    	<div class="title"><?php echo $titlePage;?></div>
        <div id="form">   
        	<?php echo $error . $success; ?>
			<form action="<?php echo $linkForm;?>" method="post" name="add-form">
				<div class="row">
					<p>Name</p>
					<?php echo $inputName ?>
				</div>
				
				<div class="row">
					<p>Status</p>
					<?php echo $status;?>
				</div>

				<div class="row">
					<p>Group default</p>
					<?php echo $groupDefault;?>
				</div>
				
				<div class="row">
					<p>Ordering</p>
					<?php echo $inputOrdering?>
				</div>
				
				<div class="row">
					<input type="submit" value="Save" name="submit">
					<input type="button" value="Cancel" name="cancel" id="cancel-button">
					<input type="hidden" value="<?php echo time();?>" name="token" />
				</div>
												
			</form>    
        </div>
        
    </div>
</body>
</html>

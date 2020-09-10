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
	$requiredPass	= true;
	
	if($action == 'edit'){
		$id = mysql_real_escape_string($id);
		$query = "SELECT `username`,CONCAT(`firstname`, ' ', `lastname`) AS fullname, `email`, `birthday`,`status`, `ordering`, `group_id` FROM `user` WHERE id = '" . $id . "'";
		$outValidate	= $database->singleRecord($query);
		$linkForm		= 'form.php?action=edit&id=' . $id;
		if(empty($outValidate)) $flagRedirect	= true;		
		$titlePage		= 'EDIT USER';
		$queryExistRecord = "SELECT `username` FROM `user` WHERE `username` = '" . $_POST['username'] . "' AND `id` != '" . $id . "'";
		$requiredPass	= false;
	}else if($action == 'add'){
		$linkForm		= 'form.php?action=add';
		$titlePage		= 'ADD USER';	
		$queryExistRecord = "SELECT `username` FROM `user` WHERE `username` = '" . $_POST['username'] . "'";	
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
		
		$source   = array(
							'username'	=> $_POST['username'], 
							'email' 	=> $_POST['email'], 
							'password' 	=> $_POST['password'], 	// Php4567!
							'birthday'	=> $_POST['birthday'], 
							'status'	=> $_POST['status'], 
							'group_id'	=> $_POST['group_id'], 
							'ordering'	=> $_POST['ordering']
						);
		$validate = new Validate($source);
		$validate->addRule('username', 'existRecord', array('database' => $database, 'query' => $queryExistRecord))
				 ->addRule('email', 'email')
				 ->addRule('password', 'password', array('action' => $action), $requiredPass)
				 ->addRule('birthday', 'date', array('start' => '01/01/1980', 'end' => date('d/m/Y', time())) )
				 ->addRule('group_id', 'group')
				 ->addRule('ordering', 'int', array('min' => 1, 'max' => 10))
				 ->addRule('status', 'status');
		
		$validate->run();

		$outValidate = $validate->getResult();
		
		if(!$validate->isValid()){
			$error = $validate->showErrors();
		}else{
			
			$outValidate['birthday'] = date("Y-m-d",strtotime($outValidate['birthday'] ));
			
			if($action == 'edit'){
				if($outValidate['password']!=null){
					$outValidate['password'] = md5($outValidate['password']);
				}else{
					unset($outValidate['password']);
				}
				$where = array(array('id', $id));
				$database->update($outValidate, $where);
			}else if($action == 'add'){
				$outValidate['password'] = md5($outValidate['password']);
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
	$inputPassword = HTML::createInput('text','password','password',$outValidate['password']);
	$inputBirthday = HTML::createInput('number','birthday','birthday',$outValidate['birthday']);
	$inputEmail = HTML::createInput('text','mail','mail',$outValidate['mail']);
	$inputOrdering = HTML::createInput('number','ordering','ordering',$outValidate['ordering']);
	$inputSave = HTML::createInput('submit','submit','save',$outValidate['save']);
	$inputCancle = HTML::createInput('button','cancle','cancle',$outValidate['cancle']);
	$inputToken = HTML::createInput('hidden','token','token',time());


	$createRow = HTML::createFromRow('name',$inputName) ;
	$createRowStatus = HTML::createFromRow('status',$status);
	// $createRowDefault = HTML::createFromRow('Default',$arrGroupDefault);
	$createRowOrdering = HTML::createFromRow('ordering',$inputOrdering);
	$createRowMail = HTML::createFromRow('Mail',$inputEmail);
	$createRowBirthday = HTML::createFromRow('Birthdat',$inputBirthday);
	$createRowPassword = HTML::createFromRow('password',$inputPassword);
	
	// SELECT STATUS
	$arrStatus 	= array(2=> 'Select status', 0 => 'Inactive', 1 => 'Active');
	$status		= HTML::createSelectbox($arrStatus, 'status', $outValidate['status']);
	
	// SELECT GROUP
	$query		= "SELECT `id`, `name` FROM `group`";
	$groupID 	= $database->createSelectbox($query, 'group_id', $outValidate['group_id']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
	<title><?php echo $titlePage;?></title>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/my-js.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
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
				<?php echo $createRowPassword ?>
				<?php echo $createRowMail ?>
				

				<?php echo $createRowStatus ?>
				<?php echo $createRowBirthday ?>

				<div class="row">
					<p>Group default</p>
					<?php echo $groupDefault;?>
				</div>
				<?php /* echo $createRowDefault */ ?> 
				

				<?php echo $createRowOrdering?>
				
				<div class="row">
					<?php echo $inputSave . $inputCancle . $inputToken?>
					<!-- <input type="submit" value="Save" name="submit">
					<input type="button" value="Cancel" name="cancel" id="cancel-button">
					<input type="hidden" value="<?php echo time();?>" name="token" /> -->
				</div>
												
			</form>    
        </div>
        
    </div>
</body>
</html>

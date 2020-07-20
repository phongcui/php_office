<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>PHP FILE - ADD</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script>
$(document).ready(function(){
	$('#cancel-button').click(function(){
		window.location = 'index.php';
	})
});
</script>


</head>
<body>
<?php
require_once './functions.php';

$title = '';
$description = '';

if(isset($_POST['title']) && isset($_POST['description'])){
	echo	$title = $_POST['title'];
	echo	$description = $_POST['description'];
}

//Error title

$errorTitle = '';

if(checkEmpty($title)){
	$errorTitle = '<p class="error"> Du lieu khong duoc de trong ne</p>';
}  


?>













	<div id="wrapper">
    	<div class="title">PHP FILE - ADD</div>
        <div id="form">   
			<form action="#" method="post" name="add-form">
				<div class="row">
					<p>Title</p>
					<input type="text" name="title" value="<?php echo $title ?>">
					<?php echo $errorTitle;?>
					
				</div>
				
				<div class="row">
					<p>Description</p>
					<textarea name="description" rows="5" cols="100"></textarea>
				
				</div>
				
				<div class="row">
					<input type="submit" value="Save" name="submit">
					<input type="button" value="Cancel" name="cancel" id="cancel-button">
				</div>
				

								
			</form>    
        </div>
        
    </div>
</body>
</html>

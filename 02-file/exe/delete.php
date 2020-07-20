<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>PHP FILE</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cancel-button').click(function(){
			window.location = 'index.php';
		});
	});
</script>
</head>
<body>

	<div id="wrapper">
    	<div class="title">PHP FILE</div>
        <div id="form">   
       
        <form action="" method="post" name="main-form">
			<div class="row">
				<p>File:</p>
				<span></span>
			</div>
			<div class="row">
				<p>Title:</p>
				<span</span>
			</div>
			<div class="row">
				<p>Description:</p>
				<span></span>
			</div>
			<div class="row">
				<input type="hidden" name="id" value="">
				<input type="submit" value="Delete" name="submit">
				<input type="button" value="Cancel" name="cancel" id="cancel-button">
			</div>
		</form>    
		
        </div>
        
    </div>
</body>
</html>

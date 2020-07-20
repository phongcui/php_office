<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>PHP FILE - Index</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#multy-delete').click(function(){
			$('#main-form').submit();
		});
	});
</script>
</head>
<body>
	<div id="wrapper">
    	<div class="title">PHP FILE - Index</div>
        <div class="list">   
			<form action="multy-delete.php" method="post" name="main-form" id="main-form">

	         	<div class="row ">
	            	<p class="no">
	            		<input type="checkbox" name="checkbox[]" value="">
	            	</p>
	                <p class="name"><span></span></p>
	                <p class="id"></p>
	                <p class="size"></p>
	                <p class="action">
	                	<a href="edit.php?id=">Edit</a> |
	                	<a href="delete.php?id=">Delete</a>
	                </p>
	            </div>


	    	</form>
    	</div>
        
	        <div id="area-button">
	        	<a href="add.php">Add File</a>
	        	<a id="multy-delete" href="#">Delete File</a>
	        </div>
    
    </div>
</body>
</html>

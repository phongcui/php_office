<?php 

	$result = array();
	$errors = '';
	if(!empty($_POST)){
		$source = $_POST;

		require_once 'Validate.class.php';
		$validate = new Validate($source);
		
		// Rule
		$validate->addRule('name', 'string', 5, 100)
// 				 ->addRule('age', 'int', 1, 90)
				 ->addRule('email', 'email')
 				 ->addRule('message', 'message', 5, 100);
		
		// Run
		$validate->run();
		$errors = $validate->showErrors();
		$result = $validate->getResult();
	}
?>



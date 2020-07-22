<?php


// Kiem tra xem du lieu khac rong khong
function checkEmpty($value){
	$flag = false;
	if(!isset($value) || trim($value) == '' ){
		$flag = true;
	}
	return $flag;
}

function checkLength($value, $min, $max){
	$flag = false;
	$length = strlen($value);
	if ($length < $min || $length > $max) {
		# code...
		$flag = true;
	}
	return $flag;
}



?>
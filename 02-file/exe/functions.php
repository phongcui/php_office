<?php


// Kiem tra xem du lieu khac rong khong
function checkEmpty($value){
	$flag = false;
	if(!isset($value) || trim($value) == '' ){
		$flag = true;
	}
	return $flag;
}

?>
<?php
$input = '69';
$strID = "78, 60,62,68,69,68,73,85,66 ,69,65,74,63,67 ,65,64,68,73,75,69,73,169";

// Input: Chuỗi lưu trữ ID của các Developer bị trễ task
// Requirement: Tìm xem Developer có ID 69 bị trễ task bao nhiêu lần
// Output: 3




$vitri = 0;
 


$arr = explode(',',$strID);

$cuoi = count($arr);

// $string = str
$xuat = '';
for ($i=0; $i < $arr[22] ; $i++) { 
    
    if($input == $arr[$i]){
        $xuat .= $arr[$i];
        echo $xuat;
    }  
}  

// echo $cuoi;
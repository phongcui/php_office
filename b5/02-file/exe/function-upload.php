<?php

function checkSizeFile($size,$min,$max){
    $flag = false;
    if($size >= $min && $size<= $max) $flag = true;
    return $flag;
}



// Check file extenstion  

function checkExtensionFile($fileName, $arrExtension){
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $flag = FALSE;
    if(in_array(strtolower($ext), $arrExtension) == true) $flag = true;
    return $flag;
}


function ramdomName($fileName, $length = 6 ){
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $arrCharater = array_merge(range('A','Z'),range('a','z'), range(0,9));
    $arrCharater = implode($arrCharater,'');
    $arrCharater = str_shuffle($arrCharater);
    $result = substr($arrCharater, 0, $length) . '.' .$ext;

    return $result;
}

?>
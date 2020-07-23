<?php
$str = "php/127/typescript/12/jquery/120/angular/50";
    /*
     * Array
     *  (
     *      'php'           => 127
     *      'typescript'    => 12
     *      'jquery'        => 120
     *      'angular'       => 50
     *  )
     *  
     */


    //  $tach = explode('/',$str);
    // $a = '';
    // foreach ($tach as $key => $value) {
    //     if(is_numeric($tach[$key])){
    //         $a =  $tach[$key];

    //         if()
    //     }


    //    $a =  $tach[$key] . '<br>';
    //    echo $a;


        // if($key % 2 == 1){
        //     $tach[$key] = $value;
        //     echo $tach[$key];
        // }
    // }
    // echo '<pre>';
    // print_r($tach);
    // echo '</pre>';


   

$arr = explode('/', $str);
$arr1 = [];
$arr2 = [];

foreach($arr as $item){
    $check_int = (int) $item;
    // echo $check_int . '<br>';
	if(!empty($check_int)){
		array_push($arr2, $item);
	}else{
		array_push($arr1, $item);
	}
}



$arr3 = array_combine($arr1, $arr2);

var_dump($arr3);
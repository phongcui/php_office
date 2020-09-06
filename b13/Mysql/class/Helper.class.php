<?php
class Helper{
    // public static function hightLightTest($input, $searchValue){
    //     return str_replace($searchValue, "<mark>$searchValue</mark>", $input);
    // }
    


    public static function highLight($input, $searchValue)
    {
        $result = $input;
        if ($searchValue != '') {
            $result = preg_replace("/" . preg_quote($searchValue, "/") . "/i", "<mark>$0</mark>", $input);
        }
        return $result;
    }
}







?>

<?php
class Helper
{
    public static function highLight($input, $searchValue)
    {
        $result = $input;
        if ($searchValue != '') {
            $result = preg_replace("/" . preg_quote($searchValue, "/") . "/i", "<mark>$0</mark>", $input);
        }
        return $result;
    }
}

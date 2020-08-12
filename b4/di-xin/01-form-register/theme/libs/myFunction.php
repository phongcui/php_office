
<?php 

    function createInput($placeholder, $name)
    {
         $xhtml = '<input class="input--style-2" type="text" placeholder="'.$placeholder.'" name="'. $name.'">';
         return $xhtml;        
    }
    function createSelectbox($name, $title, $arr)
    {
        $xhtml= '<select name="'.$name.'">';
        $xhtml .='<option disabled="disabled" selected="selected">'.$name.'</option>';

        foreach ($arr as $key => $value) {
            $xhtml .= '<option>'.$value.'</option>'; 
        }
        $xhtml .= '</select>';

        return '<div class="rs-select2 js-select-simple select--no-search">'.$xhtml.'<div class="select-dropdown"></div>
        </div>';
    }
   
?>


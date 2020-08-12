<?php
    function createSelectBox($name = 'sex', $title = 'Sex',$arr){
        $xhtml = '<select name="' .$name.'">';
        $xhtml .= '<option disabled="disabled" selected="selected" >'.$title.'</option>';
        foreach ($arr as $item ) {
            $xhtml .= '<option>'.$item.'</option>';
        }
        $xhtml .='</select>';
        return '<div class="rs-select2 js-select-simple select--no-search">'.$xhtml.'<div class="select-dropdown"></div>
        </div>';
    }


    function createInput($name, $placeholder){
        $xhtml = '<input class="input--style-2" type="text" placeholder="'.$placeholder.'" name="'.$name.'">';
        return $xhtml;
    }








?>
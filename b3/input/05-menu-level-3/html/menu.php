





<?php

require_once 'data.php';
$xhtmlMenu = '<ul class="dropDownMenu">';

foreach ($arrMenu as $keyMenu1 => $Menu1) {
    if(isset($Menu1['child'])){
        foreach ($Menu1['child'] as $keyMenu2 => $Menu2) {
            foreach ($Menu2['child'] as $keyMenu2 => $Menu3) {
                $xhtmlMenu .=  sprintf("<li><a href='%s'>%s</a></li>",$Menu3['link'],$Menu3['name'])   ;
            }
        }
    }
}
















?>


<div class="menuBackground">
    <div class="center">
        <?php   echo $xhtmlMenu;

        ?>
    </div>
</div> 


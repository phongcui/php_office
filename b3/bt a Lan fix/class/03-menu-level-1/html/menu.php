<?php 
    require_once 'data.php';
    
    $xhtmlMenu = '<ul class="dropDownMenu">';
    foreach ($arrMenu as $keyMenuLevelOne => $menuLevelOne) {
        $xhtmlMenu .= sprintf('<li><a href="%s">%s</a></li>', $menuLevelOne['link'] , $menuLevelOne['name'] );
    }
    $xhtmlMenu .= '</ul>';
   
    $xhtmlMenu = '';
    $xhtmlSlider = '';

?>

<div class="menuBackground">
    <div class="center">
        <?php echo $xhtmlMenu; ?>
    </div>
</div>

<!--   <li class="active"> -->
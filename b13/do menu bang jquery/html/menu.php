<?php
require_once('data.php');

$xhtmlMenu = '';
foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {
    if (isset($menuLevelOne['child'])) {


        $xhtmlMenu .= sprintf('<li ><a href="%s">%s</a><ul>', $menuLevelOne['link'], $menuLevelOne['name']);

        foreach ($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {
            if (isset($menuLevelTwo['child'])) {
                $xhtmlMenu .= sprintf('<li><a href="%s">%s</a><ul>', $menuLevelTwo['link'], $menuLevelTwo['name']);

                foreach ($menuLevelTwo['child'] as $keyLevelThree => $menuLevelThree) {
                    $xhtmlMenu .= sprintf('<li><a href="%s">%s</a></li>', $menuLevelThree['link'], $menuLevelThree['name']);
                }

                $xhtmlMenu .= '</ul></li>';
            } else {
                $xhtmlMenu .= sprintf('<li><a href="%s">%s</a></li>', $menuLevelTwo['link'], $menuLevelTwo['name']);
            }
        }

        $xhtmlMenu .= '</ul></li>';
    } else {
        // $classActive = ($keyLevelOne == $menuCurrent) ? 'class="active"' : '';
        $xhtmlMenu .= sprintf('<li ><a href="%s">%s</a></li>', $menuLevelOne['link'], $menuLevelOne['name']);
    }
}
?>

<div class="menuBackground" id='test'>
    <div class="center">
        <ul class="dropDownMenu">
            <?php echo $xhtmlMenu; ?>
        </ul>
    </div>
</div>
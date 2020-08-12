<?php 
    require_once 'data.php';

    $link = $_SERVER['PHP_SELF'];
    $link_array = explode('/',$link);
    echo $page = end($link_array);
    
    $xhtmlMenu = "";
    $menuCurrent = $page;
    echo '<h3 style="color:red;font-weight:bold">' . $menuCurrent.'</h3>';

    $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $page);

     $withoutExt ;

     $menuCurrent = $withoutExt;

    echo '<pre>';
    print_r($_SERVER);
    echo '</pre>';
    
    foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {
        $classActive = '';
        if (($keyLevelOne) == $menuCurrent)  $classActive = 'class="active"';
        // $xhtmlMenu = ' <ul class="dropDownMenu">';
        $xhtmlMenu .= sprintf('<li %s><a href="%s">%s</a></li>',$classActive, $menuLevelOne['link'], $menuLevelOne['name']);
    

        // echo $_SERVER["PHP_SELF"];
    }

?>

<div class="menuBackground">
    <div class="center">
        <?php echo $xhtmlMenu; ?>
    </div>
</div>

<!--   <li class="active"> -->
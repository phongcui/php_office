<?php 
   //  require_once 'data.php';    
   //  $xhtmlMenu = '<ul class="dropDownMenu">';
   //  foreach ($arrMenu as $keyMenuLevelOne => $menuLevelOne) {
   //      $xhtmlMenu .= sprintf('<li><a href="%s">%s</a></li>', $menuLevelOne['link'] , $menuLevelOne['name'] );
   //  }
   //  $xhtmlMenu .= '</ul>';

   require_once('data.php'); 
   $link = $_SERVER['PHP_SELF'];
   $link_array = explode('/',$link);
   $page = end($link_array);
   
   $xhtmlMenu = "";
   
   // echo '<h3 style="color:red;font-weight:bold">' . $menuCurrent.'</h3>';

   $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $page);

    $withoutExt ;

    $menuCurrent = $withoutExt;

    echo $menuCurrent;

   //  echo $menuCurrent;


   
   // $xhtmlMenu = '<ul class="dropDownMenu">';
   // $xhtmlMenu = '<div class="menuBackground"><div class="center"><ul class="dropDownMenu">';
   $xhtmlMenu = '<ul class="dropDownMenu">';
   foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {
      if(isset($menuLevelOne['child'])){

         $classActive = ($keyLevelOne == $menuCurrent)? ' class="active"' : '';

         if(isset($menuLevelOne['child'][$menuCurrent]))  $classActive = 'class="active"';

         $classActive = ($keyLevelOne == $menuCurrent)? ' class="active"' : '';
         if(isset($menuLevelOne['child'][$menuCurrent])) $classActive =' class="active"';

         // $xhtmlMenu .= sprintf('<li %s><a href="%s">%s</a></ul>',$classActive,$menuLevelOne['link'],$menuLevelOne['name']);

         $xhtmlMenu .= sprintf('<li%s><a href="%s">%s</a><ul>',$classActive,$menuLevelOne['link'], $menuLevelOne['name']);

         foreach ($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTow) {
            $xhtmlMenu .= '<li>';
            $xhtmlMenu .= sprintf('<a href="%s">%s</a></li>',$menuLevelTow['link'],$menuLevelTow['name']);
            $xhtmlMenu .= '</li>';
         }
   
         $xhtmlMenu .= '</ul></li>';
      } 
      else{
         // $classActive = ($menuLevelOne == $menuCurrent)? ' class="active"' : '';
         // $xhtmlMenu .= sprintf('<li%s><a href="%s">%s</a></li>',$classActive,$menuLevelOne['link'],$menuLevelOne['name']);

         $classActive = ($keyLevelOne == $menuCurrent)? ' class="active"' : '';
         $xhtmlMenu .= sprintf('<li%s><a href="%s">%s</a></li>', $classActive,$menuLevelOne['link'], $menuLevelOne['name']);
      }

   }




   //    if(isset($menuLevelOne['child'][$menuCurrent])){
       
   //    $xhtmlMenu.= sprintf('<li %s><a href="%s">%s</a></li>',$classActive,$menuLevelOne['link'],$menuLevelOne['name']);

   //    foreach ($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTow) {
   //       $xhtmlMenu.= sprintf('<li %s><a href="%s">%s</a></li>',$classActive,$menuLevelTwo['link'],$menuLevelTwo['name']);
   //    }
   
   //    $xhtmlMenu .= '</ul></li>';
   // }



//  else{
//    $classActive =  ($keyLevelOne) == $menuCurrent ?  'class="active"' : '';
  
//    $xhtmlMenu .= sprintf('<li %s><a href="%s">%s</a></li>',$classActive, $menuLevelOne['link'], $menuLevelOne['name']);
// }
   
   

  
   
   // 
   //    
   //    
   //      
   //      
   //    </ul>
   // </li>
   
      







// $xhtmlMenu .= '</ul></div></div>';
//     echo $xhtmlMenu;

    ?>

<div class="menuBackground">
    <div class="center">
        <?php   echo $xhtmlMenu;

        ?>
    </div>
</div> 
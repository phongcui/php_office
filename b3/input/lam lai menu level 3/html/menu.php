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
   foreach ($arrMenu as $keyMenu1 => $menu1) {

      if(isset($menu1['child'])){

         $classActive = ($keyMenu1 == $menuCurrent) ? 'class="active"' : '';

         if(isset($menu1['child'][$menuCurrent])) $classActive = 'class="active"';

         $xhtmlMenu .= sprintf('<li %s><a href="%s">%s</a><ul>',$classActive,$menu1['link'],$menu1['name']);


         foreach ($menu1['child'] as $keyMenu2 => $menu2) {
            if(isset($menu2['child'])){
               // $classActive = ($keyMenu2 == $menuCurrent) ? 'class="active"' : '';
               if(isset($menu2['child'][$menuCurrent])) $classActive = 'class="active"';

               foreach ($menu2['child'] as $keyMenu2 => $menu3) {
                  $xhtmlMenu .= sprintf('<li><a href="%s">%s</a></li>',$menu3['link'],$menu3['name']);
               }


            }
            else{
               $classActive = ($keyMenu2 == $menuCurrent) ? 'class="active"' : '';
               
            }
            $xhtmlMenu .= sprintf('<li %s><a href="%s">%s</a></li>',$classActive,$menu2['link'],$menu2['name']);
            



            


         }



         $xhtmlMenu .='</li></ul>';
      }
      else{
         $classActive = ($keyMenu1 == $menuCurrent) ? 'class="active"' : '';
         $xhtmlMenu .= sprintf('<li %s><a href="%s">%s</a></li>',$classActive,$menu1['link'],$menu1['name']);
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
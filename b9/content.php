<?php
    
    $xml = simplexml_load_file("https://vnexpress.net/rss/the-gioi.rss", 'SimpleXMLElement', LIBXML_NOCDATA) or die("Error: Cannot create object");
    
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);
    
   


    $array = str_replace('<![CDATA[<?xml version="1.0" encoding="UTF-8" ?>', "", $array);

    $array = str_replace(']]>', "", $array);

    $listData = $array['channel']['item'];

    // $xml1 = simplexml_load_string($array);
    
    echo '<pre>';
    print_r($listData);
    echo '</pre>';

    $xhtml = '';
    $tach = '';


    
    foreach ($listData as $data) {
        $foo = array();
        $foo = $data['description'];

        

        // $hinhNe = array();
      
        // preg_match( '/src="([^"]*)"/i', $foo, $hinhNe ) ;
        
        
        // print_r( $hinhNe ) ;

        preg_match( '/src="([^"]*)"/i', $foo, $array ) ;

        $img = $array[1];
        echo '<pre>';
        print_r($foo);
        echo '</pre>';


        $xhtml .= '                                <div class="col-md-6 p-3">
        <div class="entry mb-1 clearfix">
            <div class="entry-image mb-3">
                <a href='.$img.' data-lightbox="image" style="background: url('.$img.') no-repeat center center; background-size: cover; height: 278px;"></a>
            </div>
            <div class="entry-title">
                <h3><a href="#">'.$data['title'].'</a></h3>
            </div>
            <div class="entry-content">
                <p>'.$foo.'</p>
            </div>
            <div class="entry-meta no-separator nohover">
                <ul class="justify-content-between mx-0">
                    <li><i class="icon-calendar2"></i> 14/08/2020 15:36:32</li>
                    <li>vnexpress.net</li>
                </ul>
            </div>
            <div class="entry-meta no-separator hover">
                <ul class="mx-0">
                    <li><a href="#">Xem &rarr;</a></li>
                </ul>
            </div>
        </div>
    </div>';

    }
    
    
 



?>
 
 
                <!-- Content -->
                <?php echo $xhtml; ?>

                <!-- #content end -->
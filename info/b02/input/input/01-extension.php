<?php
    $input  = "D:/GoogleDrive/Doing/__psd/luutruonghailan/youtube-luutruonghailan-tamsu.psd";

    // Phần xử lý của học viên

    $path_parts = pathinfo($input);
    echo $path_parts['dirname'], "\n";
    echo '<br>';
echo $path_parts['basename'], "\n";
echo '<br>';
echo $path_parts['extension'], "\n";
echo '<br>';
echo $path_parts['filename'], "\n"; //
echo '<br>';


print_r(pathinfo($input));
    
    $output = [
        'name', 'extension'
    ];

    $output[0] =  $path_parts['filename'];
    $output[1] = $path_parts['extension'];

    echo '<pre>';
    print_r($output);
    echo '</pre>';


    
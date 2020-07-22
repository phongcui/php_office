<?php
    $arrMenu = [
        'index' => [
            "name"  => "Home",   "link"  => "index.php"
        ],
        'about' => [
            "name"  => "About",  
            "link"  => "data/about.php", 
            "child" => [
                'service'   => [ 
                    "name"  => "Service", 
                    "link"  => "service.php",
                    "child" => [
                        'sale'      => ["name" => "Sale", "link" => "sale.php"],
                        'training'  => ["name" => "Training", "link" => "training.php"]
                    ]
                ], 
                'company'   => [
                    "name" => "Company", 
                    "link" => "company.php",
                    "child" => [
                        'toyota' => ["name" => "Toyota","link"   => "toyota.php"]
                    ]]
        ]],
        'contact' => ["name" => "Contact", "link" => "contact.php"]
    ];

    // Yêu cầu: In ra tên của các menu cấp 3
    // Output: Sale - Training - Toyota

    $result = '';

    foreach ($arrMenu as $keyMenu1 => $menu1) {
        if(isset($menu1['child'])){
            foreach ($menu1['child'] as $keyMenu2 => $menu2) {
                if(isset($menu2['child'])){
                    foreach ($menu2['child'] as $keyMenu3 => $menu3) {
                        $result.= $menu3['name'] . '-';
                    }
                }
            }
        }
    }

    $result = substr(($result),0,-1);
    echo '<h3 style="color:red;font-weight:bold">' . $result.'</h3>';
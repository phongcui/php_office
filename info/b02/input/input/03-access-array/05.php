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
        'contact' => [
            "name" => "Contact", 
            "link" => "contact.php",
            "child" => [
                'hotline'      => ["name" => "hotline", "link" => "hotline.php"]
            ]
        ]
    ];

    // Yêu cầu: In ra tên của các menu cấp 2, 
    // Output: Service - Company

    $result = '';
foreach ($arrMenu as $keyMenu1 => $menu1) {

    if (isset($menu1['child'])) {
        foreach ($menu1['child'] as $keyMenu2 => $menu2) {
            $result .= $menu2['name'] ;
        }

    }
}
echo '<pre>';
print_r($result);
echo '</pre>';





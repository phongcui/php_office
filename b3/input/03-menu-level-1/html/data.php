<?php 
    $arrMenu = [
        'home' => [
            "name"  => "Trang chủ",   "link"  => "home.php"
        ],
        'about' => [
            "name"  => "Giới thiệu",  
            "link"  => "about.php", 
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
        'contact' => ["name" => "Liên hệ", "link" => "contact.php"]
    ];


   
    
?>

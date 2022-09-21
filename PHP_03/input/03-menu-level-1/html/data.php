<?php 
$arrMenu = [
    'index' => [
        "name"  => "Home",   "link"  => "index.php"
    ],
    'about' => [
        "name"  => "About",  
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
    'contact' => [
        "name" => "Contact", 
        "link" => "contact.php",
        "child" => [
            'hotline'  => ["name" => "hotline", "link" => "hotline.php"]
        ]
    ]
  
];
$currentMenu =  pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
?>



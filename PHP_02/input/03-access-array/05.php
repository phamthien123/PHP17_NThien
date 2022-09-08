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
                'hotline'  => ["name" => "hotline", "link" => "hotline.php"]
            ]
        ]
    ];

    // Yêu cầu: In ra tên của các menu cấp 2: kiểm tra menu 1 có child in ra menu 2

    // Output: Service - Company

    if(!empty($arrMenu)){
        foreach ($arrMenu  as $key => $value1) {
                if(isset($value1['child'])){
                    foreach ($value1['child']  as $key => $value2) {
                        if(isset($value2['child'])){
                            echo $value2['name'];
                      }
                }
              }
        }
    }
    // echo ($result);

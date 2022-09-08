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
    if(!empty($arrMenu)){
        foreach ($arrMenu  as $key => $value1) {
                if(isset($value1['child'])){
                    foreach ($value1['child']  as $key => $value2) {
                        if(isset($value2['child'])){
                            foreach ($value2['child']  as $key => $value3) {
                                if(isset($value3['child'])){
                                  echo $value3['name'];
                              }
                        }
                      }
                }
            }
        }
    }

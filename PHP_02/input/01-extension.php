<?php
    $input  = "D:/GoogleDrive/Doing/__psd/luutruonghailan/youtube-luutruonghailan-tamsu.psd";

    //Cách chuỗi thành Mảng:

    //Cách 1:
    // $input1 = explode("/", $input);
    // $input2 = explode(".", $input1[5]);
    // $Name = $input2[0];
    // $Extension = $input2[1];
    //  $output = [
    //     'Name'=> ($Name) ,
    //     'Extension' => ($Extension),
    //  ];

    //Cách 2:
     $output = [
        'Name'=> pathinfo($input,PATHINFO_FILENAME) ,
        'Extension' =>  pathinfo($input,PATHINFO_EXTENSION),
     ];
    echo '<pre>';
    print_r($output);
    echo '</pre>';

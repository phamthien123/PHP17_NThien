<?php
//bài shape_basic:
$height = 3;
$characters = 'A';
$delimiter = '-';
function Show($height,$characters = "*",$delimiter = "nbsp;"){
    $shape = "";
for ($i = 1; $i <= $height; $i++) {
        $recond = str_repeat($characters .$delimiter, $i);
        $shape .= $recond ."<br>";
}
return $shape;
}
echo Show(3);

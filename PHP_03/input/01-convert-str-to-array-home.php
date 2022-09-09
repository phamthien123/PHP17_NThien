<?php
$str = "php/127/typescript/12/jquery/120/angular/50";
/*
     * Array
     *  (
     *      'php'           => 127
     *      'typescript'    => 12
     *      'jquery'        => 120
     *      'angular'       => 50
     *  )
     *  
     */
$array = explode('/', $str);
$array1 = [];
foreach ($array as $key => $value) {
    if ($key % 2 == 0) {
        $array1[$value] = $array[$key + 1];
    }
}
echo '<pre style="color: red;">';
print_r($array1);
echo '</pre>';

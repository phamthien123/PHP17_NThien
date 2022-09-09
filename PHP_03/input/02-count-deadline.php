<?php
$input = '69';
$strID = "78, 60,62,68,69,68,73,85,66 ,69,65,74,63,67 ,65,64,68,73,75,69,73,169";

// Input: Chuỗi lưu trữ ID của các Developer bị trễ task
// Requirement: Tìm xem Developer có ID 69 bị trễ task bao nhiêu lần
// Output: 3

//bỏ cách vs khoảng trống 
$strID = preg_replace('/\s+/', '',$strID);
//chuyển Chuỗi => mảng
$explode_result= explode(',', $strID);

//cách 1:
// $result=0;
// foreach($explode_fullname as $key=> $value){
//    if($value == $input){
//         $result++;
//    } 
//   }
//   echo $result;

//cách 2:
$arrResult = array_count_values($explode_result );
    echo $arrResult[$input];
?>

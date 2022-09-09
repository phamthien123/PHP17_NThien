<?php
$zend = array(
    'php' => 127,
    'zend' => 20,
    'html' => 32,
    'type' => 12,
    'php2' => 127,
    'javascript' => 80,
);

// Input: Danh sách khóa học
// Requirement: In ra khóa học có thời lượng video nhiều nhất
// Output: Tên khóa học - thời lượng
//                  php - 127
// Max Time:
$total = max($zend);
// Key Max:
$result = array_keys($zend,$total);
foreach($result as $key => $value){
    echo $value . ' - ' .$total."<br />";
}


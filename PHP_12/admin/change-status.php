<?php
require_once 'connect.php';
if (isset($_GET['id'])) {
$query ="SELECT * FROM `rss` WHERE id='$_GET[id]'";
$result = $database->listRecord($query);
$change = $result[0]['status'];
    if ($change == "active") {
        $changeStatus = 'inactive';
    }
    else{
        $changeStatus = 'active';
    }
    $sqlUpdate ="UPDATE `rss` SET status ='$changeStatus' WHERE id='$_GET[id]'";
    $resultChange = $database->listRecord($sqlUpdate);
    header('location: index.php');
    exit;
}
?>
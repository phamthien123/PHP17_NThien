<?php
require_once 'connect.php';
if (isset($_GET['id'])) {
    $change = ($_GET['status']=="active") ? "inactive" : "active";
    $sqlUpdate ="UPDATE `rss` SET status ='$change' WHERE id='$_GET[id]'";
    $database->query($sqlUpdate);
    header('location: index.php');
    exit;
}

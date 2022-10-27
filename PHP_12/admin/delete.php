<?php
require_once 'connect.php';
if (!empty($_GET['id'])) {
    $del = "DELETE FROM `rss` WHERE id=" . $_GET['id'] . "";
    $result = $database->query($del);
    header('location: index.php');
    exit;
}

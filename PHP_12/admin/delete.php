<?php
require_once 'connect.php';
if (isset($_GET['id'])) {
 $del = "DELETE FROM `rss` WHERE id=".$_GET['id']."";
 $result = $database->listRecord($del);
 header('location: index.php');
 exit;
}

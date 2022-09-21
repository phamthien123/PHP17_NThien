<?php
require_once 'data.php';
$xhtmlMenu = null;
foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {
    $xhtmlMenu .= sprintf('<li><a href="%s">%s </a></li>', $menuLevelOne['link'], $menuLevelOne['name']);
}
?>

<div class="menuBackground">
    <div class="center">
        <ul class="dropDownMenu">
            <?php echo @$xhtmlMenu; ?>
        </ul>
    </div>
</div>

<script src="/PHP_05/input/03-menu-level-1/js/jquery.js"></script>
<script src="/PHP_05/input/03-menu-level-1/js/Myjs.js"></script>
<!-- 
<li><a href="index.php">Home </a></li>
<li class="active">
    <a href="about.php">About</a>
</li>
<li><a href="contact.php">Contact </a></li> -->
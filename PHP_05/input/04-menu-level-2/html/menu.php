<?php
require_once 'data.php';
$xhtmlMenu = null;
if (count($arrMenu) > 0) {
    foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {
        if (isset($menuLevelOne['child'])) {
            $xhtmlMenu .= sprintf('<li data-name=%s><a href="%s">%s </a><ul>', $keyLevelOne,$menuLevelOne['link'], $menuLevelOne['name']);
           
            foreach ($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {
                $xhtmlMenu .= sprintf('<li data-parent=%s><a href="%s">%s </a></li>', $keyLevelOne,$menuLevelTwo['link'], $menuLevelTwo['name']);
            }
            $xhtmlMenu .= '</ul></li>';
        } else {
            $xhtmlMenu .= sprintf('<li data-name=%s><a href="%s">%s </a></li>', $keyLevelOne,$menuLevelOne['link'], $menuLevelOne['name']);
        }
    }
}
?>
<div class="menuBackground">
    <div class="center">
        <ul class="dropDownMenu">
            <?php echo @$xhtmlMenu; ?>
        </ul>
    </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/Myjs.js"></script>
<!-- 
<li><a href="index.php">Home </a></li>
<li class="active">
    <a href="data/about.php">About</a>
    <ul>
        <li>
            <a href="data/service.php">Service</a>
        </li>
        <li>
            <a href="data/company.php">Company</a>
        </li>
    </ul>
</li>
<li><a href="data/contact.php">Contact </a></li> -->
<?php

require_once 'data.php';
$xhtmlMenu = null;
if (count($arrMenu) > 0) {
    foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {
        if (isset($menuLevelOne['child'])) {
            $xhtmlMenu .= sprintf('<li data-name=%s><a href="%s">%s</a><ul>', $keyLevelOne, $menuLevelOne['link'], $menuLevelOne['name']);
            foreach ($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {
                $xhtmlMenu .= sprintf('<li data-parent=%s><a href="%s">%s</a><ul>', $keyLevelOne,$menuLevelTwo['link'], $menuLevelTwo['name']);
                if (isset($menuLevelTwo['child'])) {
                    foreach ($menuLevelTwo['child'] as $keyLevelThree => $menuLevelThree) {
                        $xhtmlMenu .= sprintf('<li data-parent=%s><a href="%s">%s</a></li>',$keyLevelOne ,$menuLevelThree['link'], $menuLevelThree['name']);
                    }
                }
                $xhtmlMenu .= '</ul></li>';
            }
            $xhtmlMenu .= '</ul></li>';
        } else {
            $xhtmlMenu .= sprintf('<li data-name=%s><a href="%s">%s</a></li>', $keyLevelOne, $menuLevelOne['link'], $menuLevelOne['name']);
        }
    }
}
?>
<div class="menuBackground">
    <div class="center">
        <ul class="dropDownMenu">
            <?php echo $xhtmlMenu; ?>
        </ul>
    </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/Myjs.js"></script>
<!-- <ul class="dropDownMenu">
    <li><a href="index.php">Home </a></li>
    <li class="active">
        <a href="data/about.php">About</a>
        <ul>
            <li>
                <a href="data/service.php">Service</a>
                <ul>
                    <li><a href="data/sale.php">Sale</a></li>
                </ul>
            </li>
            <li>
                <a href="data/company.php">Company</a>
                <ul>
                    <li><a href="data/toyota.php">Toyota</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li><a href="data/contact.php">Contact </a></li>
</ul> -->
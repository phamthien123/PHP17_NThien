<?php
require_once 'data.php';
$xhtml = "";
if (count($arrMenu) > 0) {
    foreach ($arrMenu as $keyOne => $valueOne) {
        if (isset($valueOne['child'])) {
            foreach ($valueOne['child'] as $keyTow => $valueTow) {
                if (isset($valueTow['child'])) {
                    $xhtml .=  '<li><a href="data/service.php">'.$valueTow['name'].'</a></li>'; 
                }
            }
        }
    }
}
?>
<div class="menuBackground">
    <div class="center">
        <ul class="dropDownMenu">
            <li><a href="index.php">Home </a></li>
            <li class="active">
                <a href="data/about.php">About</a>
                <ul>
                    <!-- <li>
                        <a href="data/service.php">Service</a>
                    </li>
                    <li>
                        <a href="data/company.php">Company</a>
                    </li> -->
                    <?php echo  $xhtml ?>
                </ul>
            </li>
            <li><a href="data/contact.php">Contact </a></li>
        </ul>
    </div>
</div>
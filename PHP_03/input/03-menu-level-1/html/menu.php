<?php
require_once 'data.php';
$xhtml = "";
if (count($arrMenu) > 0) {
    foreach ($arrMenu as $key => $value) {
        $claasActive  = ($key == $currentMenu) ? ' class="active" ' : '';
        $xhtml .=  '<li '. $claasActive.'><a href="'.$value['link'].'">' . $value['name'] . '</a></li>';
        }
    }
?>
<div class="menuBackground">
    <div class="center">
        <ul class="dropDownMenu">
            <!-- <li><a href="index.php">Home </a></li>
            <li class="active">
                <a href="about.php">About</a>
            </li>
            <li><a href="contact.php">Contact </a></li> -->
            <?php echo  $xhtml ?>
        </ul>
    </div>
</div>
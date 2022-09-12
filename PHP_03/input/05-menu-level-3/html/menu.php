<?php
require_once 'data.php';
$xhtml = "";
$xhtml1 = "";
if (count($arrMenu) > 0) {
    foreach ($arrMenu as $keyOne => $valueOne) {
        if (isset($valueOne['child'])) {
            foreach ($valueOne['child'] as $keyTow => $valueTow) {
                if (isset($valueTow['child'])) {
                    foreach ($valueTow['child'] as $keyThere => $valueThree) {
                        if ($valueThree['name'] != "Toyota") {
                            $xhtml .= '<li><a href="data/sale.php">' . $valueThree['name'] . '</a></li>';
                        }
                        else{
                            $xhtml1 .= '<li><a href="data/sale.php">' . $valueThree['name'] . '</a></li>';
                        }
                    }
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
                    <li>
                        <a href="data/service.php">Service</a>
                        <ul>
                            <!--<li><a href="data/sale.php">Sale</a></li> -->
                            <?php echo  $xhtml ?>
                        </ul>
                    </li>
                    <li>
                        <a href="data/company.php">Company</a>
                        <ul>
                            <!-- <li><a href="data/toyota.php">Toyota</a></li> -->
                            <?php echo  $xhtml1 ?>
                        </ul>
                    </li>

                </ul>
            </li>
            <li><a href="data/contact.php">Contact </a></li>
        </ul>
    </div>
</div>
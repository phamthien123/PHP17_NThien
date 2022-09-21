<?php
require_once 'data.php';
$xhtmlMenu = "";
if (count($arrMenu) > 0) {
    foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {
        $classActive = ($keyLevelOne == $currentMenu) ? 'class="active"' : '';
        if (isset($menuLevelOne['child'])) {

            // Active menu level 1 khi click vào menu con ở phía trong (menu level 2 hoặc 3)
            // Cách 1
            // foreach ($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {
            //     if($keyLevelTwo == $currentMenu) $classActive = 'class="active"';
            //     if(isset($menuLevelTwo['child'])){
            //         foreach ($menuLevelTwo['child'] as $keyLevelThree => $menuLevelThree) {
            //             if($keyLevelThree == $currentMenu) $classActive = 'class="active"';
            //         }
            //     }
            // }
            // // Cách 2: in_array và array_keys
            // foreach ($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {
            //     if (in_array($currentMenu, array_keys($menuLevelOne['child']))) {
            //         $classActive = 'class="active"';
            //     }else if(in_array($currentMenu, array_keys($menuLevelTwo['child']))){
            //         $classActive = 'class="active"';
            //     }
            // }

            // Cách 03: isset
            foreach ($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {
                if (isset($menuLevelOne['child'][$currentMenu])) {
                    $classActive = 'class="active"';
                }else if (isset($menuLevelTwo['child'][$currentMenu])) {
                    $classActive = 'class="active"';
                }
            }

            // if (isset($menuLevelOne['child'][$currentMenu])) $classActive = 'class="active"';
            // foreach ($menuLevelOne as $keyLevelTwo => $menuLevelTwo) {
            //    if (isset($menuLevelTwo['child'][$currentMenu])) $classActive = 'class="active"';
            // }

            // In menu 
            $xhtmlMenu .= sprintf('<li %s><a href="%s">%s </a><ul>', $classActive, $menuLevelOne['link'], $menuLevelOne['name']);
            foreach ($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {
                if (isset($menuLevelTwo['child'])) {
                    $xhtmlMenu .= sprintf('<li><a href="%s">%s </a><ul>', $menuLevelTwo['link'], $menuLevelTwo['name']);
                    foreach ($menuLevelTwo['child'] as $keyLevelThree => $menuLevelThree) {
                        $xhtmlMenu .= sprintf('<li><a href="%s">%s </a></li>', $menuLevelThree['link'], $menuLevelThree['name']);
                    }
                    $xhtmlMenu .= '</ul></li>';
                } else {
                    $xhtmlMenu .= sprintf('<li><a href="%s">%s </a></li>', $menuLevelTwo['link'], $menuLevelTwo['name']);
                }
            }
            $xhtmlMenu .= '</ul></li>';
        } else {
            $xhtmlMenu .= sprintf('<li %s><a href="%s">%s </a></li>', $classActive, $menuLevelOne['link'], $menuLevelOne['name']);
        }
    }
}
?>
<div class="menuBackground">
    <div class="center">
        <ul class="dropDownMenu">
        <!-- <li><a href="index.php">Home </a></li>
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
        <li><a href="data/contact.php">Contact </a></li> -->
       <?php  echo $xhtmlMenu ?>
        </ul>
    </div>
</div>
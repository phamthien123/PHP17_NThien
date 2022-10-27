<?php
   class Helper{
      public static function itemStatus($id, $status){
         $xhtml = "";
         $class   = 'btn-danger';
         $icon   = 'fa-minus';

        if($status == 'active'){
            $class = 'btn-success';
            $icon = 'fa-check';
        }
        $xhtml = sprintf('<a href="change-status.php?id=%s&status=%s" class="btn btn-sm %s"><i class="fas %s"></i></a>',$id, $status, $class, $icon);
         return $xhtml;
      }
   }
?>

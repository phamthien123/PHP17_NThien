<?php
class Helper
{
    public static function itemStatus($id, $status = "active")
    {
        $xhtml = "";
        $class  = ($status == "active") ? 'btn btn-sm btn-success' : 'btn btn-sm btn-danger';
        $icon   = ($status == "active") ? 'fas fa-check' : 'fas fa-minus';
        $xhtml = sprintf('<a href="change-status.php?id=%s&status=%s" class="%s"><i class="%s"></i></a>', $id, $status, $class, $icon);
        return $xhtml;
    }
}

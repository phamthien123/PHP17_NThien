<?php
class Form
{
    public static function input($name, $value = '')
    {
        return sprintf('<input class="form-control" type="text" name="%s" value="%s">', $name, $value);
    }
    public static function label($title)
    {
        return sprintf(' <label class="font-weight-bold">%s</label>', $title);
    }
    public static function Ordering($name, $value = '')
    {
        return sprintf(' <input class="form-control" type="text" name="%s" value=%s>', $name, $value);
    }
    public static function hidden($name, $value = '')
    {
        return sprintf('<input class="form-control" type="hidden" name="%s" value="%s">', $name, $value);
    }
    function SelectBox($name, $arrValue,$title = "default")
    {
        $html = '<select class="custom-select" name="'.$name.'">';
        if(!empty($arrValue)){
            foreach ($arrValue as $key => $value) {
               $selected = ($title == $key) ? ' selected' : ''; 
               $html .= sprintf('<option value="%s" %s>%s</option>',$key,$selected,ucwords($value));    
            }
        }
        $html .= '</select>';
        return $html;
    }
}

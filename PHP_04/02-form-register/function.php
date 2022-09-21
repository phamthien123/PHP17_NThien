<?php
//input
function creatable($type, $placeholder, $name = "Name")
{
  return sprintf('<input class="input--style-2" type="%s" placeholder="%s" name="%s">', $type, $placeholder, $name);
}

//ucfirst : viết hoa chữ đầu tiên
function SelectBox($name, $arrValue, $title = "Class")
{
  $html = sprintf('<div class="rs-select2 js-select-simple select--no-search">
        <select name="%s">
          <option disabled="disabled" selected="selected">%s</option>', $name, $title);
  foreach ($arrValue as $key => $value) {
    $html .= sprintf('<option>%s</option>', ucfirst($value));
  }
  $html .= '</select><div class="select-dropdown"></div> </div>';
  return $html;
}

function BirthDay($name, $placeholder = "Birthdate")
{
  return sprintf('<input class="input--style-2 js-datepicker" type="text" placeholder="%s" name="%s">
  <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>', $placeholder, $name);
}

<?php
namespace core;
class view {
    public function __construct() {

    }
    public function render($scriptName,$data = null) {
      if (isset($data))
      {
        foreach ($data as $key => $value) {
          ${$key} = $value;
        }
      }
        require_once __DIR__ ."/../app/views/".$scriptName.".php";
    }
}

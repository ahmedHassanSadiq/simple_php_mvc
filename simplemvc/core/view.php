<?php
namespace core;
class view {
    public function __construct() {
        
    }
    public function render($scriptName) {
        require_once __DIR__ ."/../app/views/".$scriptName.".php";
    }
}


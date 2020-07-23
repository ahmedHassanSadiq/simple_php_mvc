<?php
namespace core;
require_once "bootstrap.php";
require_once 'view.php';

/*
 * controller make instance from view class as $view variable
 * view contain render() method that is require view file
 * any variable assigned to view class is used in view pages 
 */
class controller {
    public function __construct() {
        $this->view = new view;
    }
}

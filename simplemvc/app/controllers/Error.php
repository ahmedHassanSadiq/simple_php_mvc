<?php
require_once __DIR__ . '/../../core/controller.php';

class ErrorF extends \core\controller{
    
    public function errAction(){
        $this->view->message = "sorry This page is not found";
        $this->view->render("error");
    }
    
    
}
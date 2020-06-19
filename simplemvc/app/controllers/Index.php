<?php
require_once __DIR__ . '/../../core/controller.php';

class Index extends \core\controller{
    
    public function indexAction($param = "hello"){
        $this->view->message = "<h2>This is index page $param </h2>";
        $this->view->render("index");
    }
}
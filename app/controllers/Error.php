<?php
require_once __DIR__ . '/../../core/controller.php';

class ErrorF extends \core\controller{
    public function err(){
        $this->view->message = "sorry This page is not found";
        $data["another"] = "helo khalti";
        $this->view->render("error",$data);
    }
}

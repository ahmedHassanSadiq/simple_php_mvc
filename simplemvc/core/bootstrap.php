<?php
class bootstrap {
    public function __construct() {
    /// Route
    $token = explode("/", trim($_SERVER["REQUEST_URI"],"/"));
    //delete index and project name from token
    for($i=0 ; $i < 2 ; $i++){ 
        array_shift($token);
    }
    if(isset($token[0])){
        $controllername = ucfirst($token[0]);
    }else{
        $controllername = "Index";
    }
    if(file_exists("app/controllers/$controllername.php")){
        require_once __DIR__."/../app/controllers/$controllername.php"; 
        $controllers = new $controllername;
        if(isset($token[1])) {
            $action_name = $token[1]."Action";
        }else{
            $action_name = "indexAction";
        }
        $controllers->{$action_name}($token[2]?$token[2]:null);
    }else{
        require_once __DIR__."/../app/controllers/Error.php"; 
        $controllers = new ErrorF;
        $controllers->errAction();
    }
    
    }
}

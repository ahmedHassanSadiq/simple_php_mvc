<?php
class bootstrap {
    public function __construct() {

    /* section 1 */

    /// Route
    $token = explode("/", trim($_SERVER["REQUEST_URI"],"/"));
    //delete index and project name from token
    for($i=0 ; $i < 2 ; $i++){
        array_shift($token);
    }
    /* section 2 */
    // if the controller exists and set controller name at first
    if(isset($token[0])){
        $controllername = ucfirst($token[0]);
    }else{
    // set default controller  e.g. Home controller
        $controllername = "Index";
    }
    // check the controller exist from controller name @var
    if(file_exists("app/controllers/$controllername.php")){
        require_once __DIR__."/../app/controllers/$controllername.php";
        $controllers = new $controllername;
    /* section 3 #actions */
        if(isset($token[1])) {
    // set default action  e.g. 1 pagination controller
            $action_name = $token[1]."Action";
        }else{
            $action_name = "indexAction";
        }
        $controllers->{$action_name}(isset($token[2])?$token[2]:null);
    }else{
        require_once __DIR__."/../app/controllers/Error.php";
        $controllers = new ErrorF;
        $controllers->errAction();
    }
    }
}

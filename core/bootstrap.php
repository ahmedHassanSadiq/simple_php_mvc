<?php
require_once __DIR__."/add_ons/constants.php";
require_once __DIR__."/add_ons/config.php";


// auto loader class
function auto_loader(){
    foreach ( AUTOLOADER as $library) {
        require_once(__DIR__."/libraries/".$library.".php");
    }
}


auto_loader();

class bootstrap {
    public static $uri_segments = "";

    public function __construct() {

    //load libraries
        foreach ( AUTOLOADER as $library) {
            # code...
        }

    /* section 1 */

    /// Route

    $token = explode("/", trim($_SERVER["REQUEST_URI"],"/"));

    //delete index and project name from token

    for($i=0 ; $i < 1 ; $i++){
        array_shift($token);
    }

    self::$uri_segments = $token;


    /* section 2 */
    // if the controller exists and set controller name at first

    if(isset($token[0])){
        $controllername = ucfirst($token[0]);
    }else{

    // set default controller  e.g. Home controller

        $controllername = DEFAULT_CONTROLLER;
    }

    // check the controller exist from controller name @var

    if(file_exists("app/controllers/$controllername.php")){
        require_once __DIR__."/../app/controllers/$controllername.php";
        $controllers = new $controllername;

    /* section 3 #actions */

        if(isset($token[1])) {

            $action_name = $token[1]."Action";
        }else{

             // set (index) action as default action

            $action_name = "index" . "Action";
        }

        $controllers->{$action_name}(isset($token[2])?$token[2]:null);

    }else{
        require_once __DIR__."/../app/controllers/Error.php";
        $controllers = new ErrorF;
        $controllers->err();
    }

    }
}

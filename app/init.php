<?php
// Load config file
    require_once 'config/config.php';

//Load Helpers
//require_once 'helpers/pay.js';
require_once 'helpers/urlHelper.php';
require_once 'helpers/sessionHelper.php';
require_once 'helpers/Utils.php';
require_once 'helpers/mailHelper.php';
require_once 'helpers/otherHelp.php';
require_once 'helpers/PHPMailer/PHPMailer.php';
require_once 'helpers/PHPMailer/SMTP.php';
require_once 'helpers/PHPMailer/Exception.php';

//Load libraries files
    // require_once 'libraries/Core.php';
    // require_once 'libraries/App.php';
    // require_once 'libraries/Controller.php';

    //Autoload Core LIbraries
    spl_autoload_register(function($classname){
        require_once 'libraries/' . $classname . '.php';
    });
//$this->controller = new $this->controller;
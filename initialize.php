<?php

define('EMAIL', 'lmswpf@gmail.com');
define('PASSWORD', 'lms@wpf123');


require_once "functions/db_credientials.php";
require_once  "functions/db_functions.php";
require_once  "functions/functions.php";
require_once  "functions/validation_functions.php";
require_once  "vendor/autoload.php";
require_once  "functions/email_functions.php";
require_once "class/model.php";
require_once "class/verifyEmail.php";
foreach(glob('class/*.php') as $file) {
    require_once($file);
}
function my_autoload($class) {
    if(preg_match('/\A\w+\Z/', $class)) {
        include('class/' . $class . '.php');
    }
}
spl_autoload_register('my_autoload');

$database = db_connect();
Model::set_database($database);
$session = new Session();
$authController = new Auth();

//echo PROJECT_ROOT . "<br>";
//echo url_for('eyob\_login.php');
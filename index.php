<?php
    
include_once "./loadlib.php";

LoadClass::addIncludePath('./src');
LoadClass::addIncludePath('./blog/src');

use Fw\Core\Application;

$app = new Application(array(
    'applicationPath'=>'./blog/',
    'database'=>include('./config/database.php')
));

$app->run();

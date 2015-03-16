<?php
    
include_once "./loadlib.php";

LoadClass::addIncludePath('./src');
LoadClass::addIncludePath('./blog/src');

use Fw\Core\Application;

$app = new Application(array(
    'applicationPath'=>'./blog/',
    'defaultController'=>'l',
    'database'=>include('./config/database.php'),
    'debug'=>true
));

$app->run();

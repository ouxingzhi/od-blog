<?php
    
include_once "../loadlib.php";

//公共类路径
LoadClass::addIncludePath('../src');
//admin的类路径
LoadClass::addIncludePath('./src');

use Fw\Core\Application;

$app = new Application(array(
    'applicationPath'=>__DIR__,
    'database'=>include('../config/database.php'),
    'urlmapping'=>include('./configs/mapping.php')
));

$app->run();

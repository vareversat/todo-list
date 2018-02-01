<?php

require_once (__DIR__.DIRECTORY_SEPARATOR."Models".DIRECTORY_SEPARATOR."Autoloader.php");

try{
    Autoloader::load();
}
catch (RuntimeException $re){
    $re->getMessage();
}

new FrontController();
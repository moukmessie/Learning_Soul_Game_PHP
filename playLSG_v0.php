<?php
require  __DIR__ . '/class/Autoloader.php';
Autoloader::register();

//require 'vendor/autoload.php';

$lsg = new \lsg\LearningSoulsGame_old() ;
$lsg->play_v1() ;
?>



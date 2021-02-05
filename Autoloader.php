<?php

class Autoloader
{
    static function register(){

        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
    static function autoloader($class_name){
        $class_name = str_replace('`\\',DIRECTORY_SEPARATOR, $class_name);

        require $class_name . 'php';
    }
}

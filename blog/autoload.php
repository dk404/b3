<?php


//    function __autoload($className){
//        require_once("library/".$className.".php");
//    }

    spl_autoload_register(function($className){
        $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);

//        $tmp = (!preg_match('/library/', $className)) ? "library\\" : null ;
        $tmp = (!strstr($className, "library\\")) ? "library\\" : null ;

        if(file_exists(__DIR__."\\".$tmp.$className.".php"))
        {
            require_once(__DIR__."\\".$tmp.$className.".php");
        }
        else
        {
            exit("Файл не найден: ".__DIR__."\\".$tmp.$className.".php");
        }

//        require_once(__DIR__."\library\\".$className.".php");

    });


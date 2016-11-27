<?php


//    function __autoload($className){
//        require_once("library/".$className.".php");
//    }

    spl_autoload_register(function($className){
        $DR = DIRECTORY_SEPARATOR;

        $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);

//        $tmp = (!preg_match('/library/', $className)) ? "library\\" : null ;
        $tmp = (!strstr($className, "library".$DR)) ? "library".$DR : null ;

        if(file_exists(__DIR__.$DR.$tmp.$className.".php"))
        {
            require_once(__DIR__.$DR.$tmp.$className.".php");
        }
        else
        {
            exit("Файл не найден: ".__DIR__.$DR.$tmp.$className.".php");
        }

//        require_once(__DIR__."\library\\".$className.".php");

    });  


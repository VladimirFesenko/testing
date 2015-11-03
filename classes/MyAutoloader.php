<?php

class MyAutoloader {
    public static function register(){
        spl_autoload_register([__CLASS__,'autoload'],true,false);
    }
    public static function autoload($class){
        $dirs=[
            __DIR__.'/../classes/',
            __DIR__.'/../models/',
            __DIR__.'/../controllers/'
        ];
        foreach($dirs as $dir){
            $path=$dir.$class.'.php';
            if(file_exists($path)){
                require_once $path;
            }
        }
    }

} 
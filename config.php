<?php
require_once __DIR__.'/classes/Twig/Autoloader.php';
require_once __DIR__ . '/classes/MyAutoloader.php';

define('DSN','mysql:host=localhost; dbname=bwt');
define('USER','root');
define('PASSWORD','');
define('URL','http://www.gismeteo.ua/city/daily/5093/');
define('SECRET', '6LcTpA4TAAAAALPwnXNq4R0u7Gh3NJVVdwjCrwPz');


Twig_Autoloader::register();
MyAutoloader::register();





//echo var_dump(spl_autoload_functions());

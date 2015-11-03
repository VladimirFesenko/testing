<?php
require_once __DIR__.'/config.php';

$ctrl=isset($_GET['ctrl'])?$_GET['ctrl']:'IndexCtrl';
$path=__DIR__.'/controllers/'.$ctrl.'.php';

if(file_exists($path)){
    $class=new $ctrl;
    $class->get_body();
}else{
    echo 'Загружаемый файл отсуствует.';
}









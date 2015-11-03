<?php
abstract class AController{
    protected $view;
    protected $twig;

    public function __construct($config=[]){
        $loader=new Twig_Loader_Filesystem('views');
        $this->twig=new Twig_Environment($loader,$config);
    }

    public function display($params=[]){
        $templ=$this->twig->loadTemplate($this->view.'.html');
        echo $templ->render($params);
    }
}
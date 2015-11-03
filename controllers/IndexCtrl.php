<?php
class IndexCtrl
    extends AController{
    protected $view='index';

    public function get_body(){
         $this->display();
    }
}
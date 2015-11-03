<?php
class ConfirmCtrl
    extends AController{
    protected $view='confirm';

    public function get_body(){
        $user=new RegistrationModel();
        if(isset($_GET)){
            $user->confirm($_GET['hash']);
        }
        $this->display(['error'=>$user->err]);
    }
}
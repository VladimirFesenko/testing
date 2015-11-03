<?php

class FeedBackCtrl
    extends AController{
    protected $view = 'feedBackForm';

    public function get_body(){
        $user = new FeedBackModel($_POST);
        if ($user->send() === TRUE) {
             $this->display([
                'error' => $user->err,
            ]);
        } else {
             $token=md5(uniqid());
             $this->display([
                'token' =>$token,
                'name' => $user->name,
                'email' => $user->email,
                'text' => $user->text,
                'error' => $user->err
            ]);
        }
    }
}
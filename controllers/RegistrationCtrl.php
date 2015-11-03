<?php
class RegistrationCtrl
    extends AController{
    protected $view='registrationForm';

    public function get_body(){
            $user = new RegistrationModel($_POST);
            $reg = $user->registration();

        if ($reg === TRUE) {
             $this->display(['error' => $user->err]);
        } else {
             $this->display([
                'name' => $user->name,
                'login' => $user->login,
                'email' => $user->email,
                'error' => $user->err
            ]);
        }
    }
}
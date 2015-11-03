<?php
class FeedBackModel extends AModel {

    protected static $table='feedback';
    public $err=[];

    public function __construct($post=[]){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $this->name=Validation::clearData($post['name']);
            $this->email=Validation::clearData($post['email']);
            $this->text=Validation::clearData($post['text']);
            $this->token=strip_tags($post['token']);
        }
    }
    public function send(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(!Validation::isEmptyFields($_POST)) {
                $this->err['msg']=Validation::ERR_REQUIRED;
            }

            if(!Validation::checkName($this->name)){
                $this->err['name']=Validation::ERR_NAME;
            }

            if(!Validation::checkEmail($this->email)){
                $this->err['email']=Validation::ERR_EMAIL;
            }

            if(strlen($this->text)<=25){
                $this->err['text']='Текст сообщения должен быть не менее 25 символов';
            }

            $sectret='6LcTpA4TAAAAALPwnXNq4R0u7Gh3NJVVdwjCrwPz';
            $response=$_POST['g-recaptcha-response'];

                if(!Validation::Recaptcha($response,$sectret)){
                    $this->err['msg']='Ошибка ввода каптчи';
                    return FALSE;
                }


            if(FeedBackModel::find_by_column('token',$this->token)>0){
                //$this->err['msg']='Сообщение уже отправлено';
                return FALSE;
            }

            if(empty($this->err)){
                if($this->insert()>0){
                    $this->err['msg']='Сообщение отправлено';
                    return TRUE;
                }
            }
        }
    }
    public function render(){
        return $this->find_all();
    }
}
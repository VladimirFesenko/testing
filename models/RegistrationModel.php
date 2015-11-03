<?php
/**
 * Class User
 * @property $id
 * @property $name
 * @property $login
 * @property $email
 * @property $password
 * @property $hash
 * @property $confirm
 * @property $session
 */
class RegistrationModel extends AModel{

    protected static $table='users';
    public $err=[];

    public function __construct($post=[]){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $this->name=Validation::clearData($post['name']);
            $this->login=Validation::clearData($post['login']);
            $this->email=Validation::clearData($post['email']);
            $this->password=trim($post['password']);
            $this->conf_pass=trim($post['conf_pass']);
        }
    }

    public function registration(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            if(!Validation::isEmptyFields($_POST)){
                echo 'Пустое поле :(';
                $this->err['msg']=Validation::ERR_REQUIRED;
            }

            if(!Validation::checkName($this->name)){
                $this->err['name']=Validation::ERR_NAME;
            }

            if(!Validation::checkLogin($this->login)){
                $this->err['login']=Validation::ERR_LOGIN;
            }

            if(!Validation::checkEmail($this->email)){
                $this->err['email']=Validation::ERR_EMAIL;
            }

            if(!Validation::matchPassword($this->password,$this->conf_pass)){
                $this->err['msg']=Validation::ERR_PASSWORD_CONF;
            }

            if(RegistrationModel::find_by_column('login',$this->login)>0){
                $this->err['login'] ='Пользователь с таким логином уже существует';
                return FALSE;
            }
            //var_dump($this);die;
            if(empty($this->err)){
                //если ошибок нет то записываем пользователя в базу данных

                unset($this->conf_pass);
                $this->password=password_hash($this->password, PASSWORD_DEFAULT);
                $this->hash=md5(microtime());
                //var_dump($this->hash);die;
                if($this->insert()>0){
                    //если удачно выполнена запись в базу данных
                    //тогда отправляем письмо пользователю с ссылкой
                    //для подтверждения учетной записи

                    $headers='';
                    $headers.="From: Admin <admin@gmail.com> \r\n";
                    $headers.='Content-Type: text/plain; charset=utf8';

                    $subject='Регистрация';

                    $mail_body='Спасибо за регистрацию на сайте. Ваша ссылка для подтверждения учетной записи:
                http://'.$_SERVER['HTTP_HOST'].'/index.php?ctrl=Confirm&hash='.$this->hash;

                    mail($this->email,$subject,$mail_body,$headers);

                    $this->err['msg']=$this->name.', вы успешно зарегистрировались на сайте!!!
                    Вам направлено письмо для активации учетной записи';
                    return TRUE;
                }
            }
        }
    }
    public function confirm($hash){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $user=RegistrationModel::find_by_column('hash',$hash);
            if($user->hash==$hash && $user->confirm==0){
                //если хеш из письма равен хешу из базы данных
                //активируем учетную запись
                $this->id=$user->id;
                $this->confirm=1;
                if($this->update()>0){
                    $this->err='Вы подтвердили учетную запись';
                }
            }elseif($user->confirm==1){
                $this->err='Ваша учетная запись уже активирована';
            }else{
                $this->err='Неверная ссылка';
            }
        }
    }
}
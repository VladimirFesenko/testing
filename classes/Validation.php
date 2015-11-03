<?php
class Validation{

    const ERR_REQUIRED ='Пожайлуста заполните все объязательные поля';
    const ERR_PASSWORD_CONF ='Вы не правильно подтвердили пароль';
    const ERR_PASSWORD='Вы не правильно ввели пароль';
    const ERR_EMAIL='Недопустимый почтовый ящик';
    const ERR_NAME='Недопустимое имя';
    const ERR_LOGIN='Недопустимый логин';
    const ERR_CHECK_HUMANITY='Не пройдена проверка на человечность';

    public static function matchPassword($password,$conf_pass){
        if($password===$conf_pass){
            return TRUE;
        }
    }
    public static function isEmptyFields($post){
        foreach($post as $key=>$val){
            if(empty($val)){
               return TRUE; 
            }
        }
    }
    public static function checkLogin($login){
        if(preg_match('/^\D[a-zA-Z0-9]{4,19}$/',$login)){
            return TRUE;
        }
    }

    public static function checkName($name){
        if(preg_match('/^\D[a-zA-Z0-9а-яА-ЯЁё]{4,19}$/u',$name)){
            return TRUE;
        }
    }

    public static function checkEmail($email){
        if(preg_match('/^\D[a-z0-9-]+@{1}[a-z0-9]+\.[a-z]+$/',$email)){
            return TRUE;
        }
    }

    public static function clearData($str){
        return strip_tags(trim($str));
    }
    public static function Recaptcha($response, $secret)
    {
        if (!empty($response)) {
            echo $response->success;
            //формируем данные которые нужны для отправки запроса проверки ввода капчи
            $googleUrl = 'https://www.google.com/recaptcha/api/siteverify';
            $remoteIp = $_SERVER['REMOTE_ADDR'];

            //формируем запрос
            $url = $googleUrl . '?secret=' . $secret . '&response=' . $response . '&remoteip=' . $remoteIp;

            //получаем ответ
            $response = file_get_contents($url);

            //конвертируем в объект
            $response = json_decode($response);

            //проверяем правильность ответа
            if ($response->success) {
                return TRUE;
            }
            return FALSE;
        }
    }
    public static function myCaptcha($num1,$num2,$res){
        $sum=$num1+$num2;
        if($sum==$res){
            return true;
        }
        return false;
    }
}
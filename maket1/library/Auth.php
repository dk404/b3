<?php
namespace library;

use library\TextSecurity;
use library\DB;
use library\Path;
use mail\Mail;

class Auth
{


    private $confirmUrl = "confirm.php";
    private $baseDir;


    public function __construct($baseDir = null)
    {
        $this->baseDir = $baseDir;
    }





    /**
     * @param $DB - это экземпляр объекта new mysqli
     * @return bool|int|string
     */
   public function auth_check($DB){

        if(!is_numeric($_COOKIE["user_id"]) or !$_COOKIE["token"]){return false;}


        //найдем указанного пользователя
        $resUser = $DB->select("SELECT * FROM users WHERE ID = '".$_COOKIE["user_id"]."'");
        if($resUser["error"] or $resUser['result'][0]['pass'] != $_COOKIE["token"])
        {
            return false;
        }
        else
        {
            return $_COOKIE["user_id"];
        }

    }


    /**
     * Регистрация
     * @param $array - [email, pass]
     * @param bool $close - закрывать ли соединение с бд
     * @throws \Exception
     */
    public function register($array, $close = false)
    {

        //все поля должны быть заполнены
        if(!$array["email"] or !$array["pass"])
        {
            throw new \Exception('Поля email & pass должны быть заполнены');
        }

        //email должен быть email
        if(!TextSecurity::check_email($array["email"]))
        {
            throw new \Exception('Некоректный email');
        }

        //Проверим есть ли уже такой пользователь?
        $DB = new DB();
        $resSelect = $DB->select_one("SELECT * FROM users WHERE email = '".$array["email"]."'", $close);

        if($resSelect["result"])
        {
            if($resSelect["result"]["confirm_email"] == 1)
            {
                throw new \Exception('Такой пользователь уже зарегистрирован');
            }
            else
            {
                throw new \Exception('Такой пользователь уже зарегистрирован, требуется подтверждения email');
            }
        }


        //пишем в бд
        $arr = [
            "email" => $array["email"]
           ,"pass"  => password_hash($array["pass"], PASSWORD_DEFAULT)
           ,"token" => md5(time().rand())
           ,"date"  => time()
        ];

        $resInsert = $DB->insert("users", $arr, $close);

        if($resInsert["error"])
        {
            throw new \Exception($resInsert["error_text"]);
        }


        //Отправим письмо с ссылкой для подтверждения email
        $this->sendToken($array["email"], $arr["token"]);


        return $resInsert;

    }


    /**
     * Отправка ссылки для подтверждения о регистриции на email
     * @param $email
     * @param null $token
     * @return bool
     * @throws \Exception
     */
    public function sendToken($email, $token = null)
    {

        if(!$email)
        {
            throw new \Exception("Параметр email является обязательным");
        }

        if(!$token)
        {
            $DB = new DB();

            $resSelect = $DB->select_one("SELECT token FROM users WHERE email = '".$email."'", true);
            if($resSelect["error"])
            {
                throw new \Exception($resSelect["error_text"]);
            }
            else
            {
                $token = $resSelect["result"]["token"];
            }

        }



        //Составим и отправим письмо
        $Path = new Path();
        $tokenLink = $Path->clear_url($this->baseDir).$this->confirmUrl."?token=".$token;

        $html = "
            <h3>Подтверидь регистрацию</h3>
            <p> Для того чтобы подтвердить регистрации на ".$Path->clear_url($this->baseDir)."
                перейдите пожалуйста по ссылке: <a href='".$tokenLink."'>".$tokenLink."</a>
             </p>
        ";

        $m = new Mail('utf-8');
        $m->To($email);
        $m->Subject("Подтведить регистрацию на ".$Path->clear_url($this->baseDir));
        $m->Body($html, "html");
        $m->log_on(true);
        $m->Send();

        if(!$m->status_mail["status"])
        {
            throw new \Exception($m->status_mail["message"]);
        }

        //response
        return true;

    }


}
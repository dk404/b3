<?php

namespace library;

class Auth
{

    /**
     * проверка авторизован ли наш пользователь
     * @param $DB - это экземпляр объекта new mysqli
     * @return bool|int|string
     */
   public function auth_check($DB){

        if(!is_numeric($_COOKIE["user_id"]) or !$_COOKIE["token"]){return false;}


        //найдем указанного пользователя
        $resUser = $DB->select("SELECT * FROM users WHERE ID = '".$_COOKIE["user_id"]."'");
        if($resUser["error"] or $resUser['result'][0]['token'] != $_COOKIE["token"])
        {
            return false;
        }
        else
        {
            return $resUser['result'][0];
        }

    }


}
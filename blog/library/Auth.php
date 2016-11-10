<?php

/**
 * Created by PhpStorm.
 * User: sht_j
 * Date: 27.10.2016
 * Time: 18:57
 */
class Auth
{

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


}
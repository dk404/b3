<?php

require_once("autoload.php");
$T_check  = new TextSecurity();
$DB       = new DB();


if($_GET["token"]){

    $token = $T_check->check1($_GET["token"]);

    //сделать выборку из бд

    $sql = "SELECT * FROM users WHERE token = '".$token."'";
    $resSelect = $DB->select($sql);

    if($resSelect["error"]){
        exit("Пользователь не найден");
    }
    elseif ($resSelect["result"][0]["confirm_email"] == 1){
        exit("Такой пользователь уже существует");
    }

    //пишем в базу
    $resUpdate = $DB->update("users",["confirm_email" => 1], "ID = ".$resSelect["result"][0]["ID"]);
    if($resUpdate["error"]){
        exit($resUpdate["error_text"]);
    }

    echo "Регистрация завершена";

}

?>


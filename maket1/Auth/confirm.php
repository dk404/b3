<?php

require_once "../autoload.php";
$PATH = new library\Path();
$DB = new DB();
$CheckText = new TextSecurity();


if($_GET["token"]) {
$token = $CheckText->check1($_GET["token"]);
$resDB = $DB->select("SELECT ID, token, status FROM confirmemail  WHERE token='".$token."'");

    if(!$resDB["result"]){
        exit("Доступ закрыт");
    }

    if($resDB["result"][0]["status"] == 1){
        exit ("Token already used");
    }

    $resupdate = $DB->update("confirmemail", ["status" => 1], 




}


?>

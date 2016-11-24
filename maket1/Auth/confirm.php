<?php

require_once "../autoload.php";
$PATH = new library\Path();
$DB = new DB();
$CheckText = new TextSecurity();


if($_GET["token"]) {
$token = $CheckText->check1($_GET["token"]);
$resDB = $DB->select("SELECT ID FROM confirmemail  WHERE token='".$token."'");

}
?>

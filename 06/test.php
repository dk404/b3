<?php
require_once("DB.php");

$DB = new DB();

$resDb1 = $DB->insert("users", ["user_name" => "uuuu1", "pass" => "1111"]);
$resDb2 = $DB->insert("users", ["user_name" => "uuuu2", "pass" => "1111"], true);
$resDb3 = $DB->insert("users", ["user_name" => "uuuu3", "pass" => "1111"], true);

$ddd = 1;


<?php

$connect_settings = [
        "host"  => "127.0.0.1"
      , "login" => "test"
      , "pass"  => 123
      , "db"    => "b3"
    ];


$db = new mysqli($connect_settings["host"], $connect_settings["login"], $connect_settings["pass"], $connect_settings["db"]);
if($db->connect_errno){ exit($db->connect_errno); }

/*------------------------------
insert
-------------------------------*/
$resInsert = $db->query("INSERT INTO users (user_name, pass, speciality) VALUES ('ярик', 1223, 'авава')");
if(!$resInsert){  exit($db->error); }


/*------------------------------
update
-------------------------------*/
$resUpd = $db->query("UPDATE users SET user_name='GFGFG' WHERE ID=18");
if(!$resUpd){  exit($db->error); }


/*------------------------------
update
-------------------------------*/
$resDel = $db->query("DELETE FROM users WHERE user_name='COPY DATABASE '");
if(!$resDel){  exit($db->error); }


/*------------------------------
select
-------------------------------*/
$resSelect = $db->query("SELECT * FROM users WHERE ID IN (1)");
if(!$resSelect){  exit($db->error); }

if($resSelect->num_rows > 0){
    $res = $resSelect->fetch_all(MYSQLI_ASSOC);
}



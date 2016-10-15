<?php

function db_connect(){

    $connect_settings = [
        "host"  => "127.0.0.1"
        , "login" => "test"
        , "pass"  => 123
        , "db"    => "b3"
    ];


    $result = [];

    $db = new mysqli($connect_settings["host"], $connect_settings["login"], $connect_settings["pass"], $connect_settings["db"]);
    if($db->connect_errno){
        $result["error"] = $db->connect_errno;
        $result["error_text"] = $db->connect_error;
    }

    $result["connect"] = $db;

    return $result;
}


function db_disconect($db){
    $db->close();
}


/*------------------------------
insert
-------------------------------*/
function db_insert($table, $arr){

   $db = db_connect();
   if($db["error_text"]){ return $db; }

   $keys = array_keys($arr);
   $values = array_values($arr);

    $resInsert = $db["connect"]->query("INSERT INTO ".$table." (".implode(",", $keys).") VALUES ('".implode("','", $values)."')");
    if(!$resInsert){
        $result["error"] = $db["connect"]->connect_errno;
        $result["error_text"] = $db["connect"]->connect_error;
    }

    $result["result"] = $resInsert;

    //закрываем соединение с бд
    $db["connect"]->close();

    //response
    return $result;
}


/*------------------------------
update
-------------------------------*/
function db_update($table, $arr, $where){

    $db = db_connect();
    if($db["error_text"]){ return $db; }

    $newArr = [];
    foreach($arr as $key => $value){
        $newArr[] = $key."='".$value."'";
    }



    $resdb = $db["connect"]->query("UPDATE ".$table." SET ".implode(",", $newArr). " WHERE ".$where);
    if(!$resdb){
        $result["error"] = $db["connect"]->connect_errno;
        $result["error_text"] = $db["connect"]->connect_error;
    }
    $result["result"] = $resdb;

    //закрываем соединение с бд
    $db["connect"]->close();

    //response
    return $result;
}


/*------------------------------
delete
-------------------------------*/
function db_delete($table, $where){

    $db = db_connect();
    if($db["error_text"]){ return $db; }


    $resdb = $db["connect"]->query("DELETE FROM ".$table." WHERE ".$where);
    if(!$resdb){
        $result["error"] = $db["connect"]->connect_errno;
        $result["error_text"] = $db["connect"]->connect_error;
    }
    $result["result"] = $resdb;

    //закрываем соединение с бд
    $db["connect"]->close();

    //response
    return $result;
}

/*------------------------------
select
-------------------------------*/
function db_select($sql){

    $db = db_connect();
    if($db["error_text"]){ return $db; }


    $resdb = $db["connect"]->query($sql);
    if(!$resdb){
        $result["error"] = $db["connect"]->connect_errno;
        $result["error_text"] = $db["connect"]->connect_error;
    }
    else
    {
        $result["result"] = $resdb->fetch_all(MYSQLI_ASSOC);
    }


    //закрываем соединение с бд
    $db["connect"]->close();

    //response
    return $result;
}






<?php

$db =new mysqli("localhost","root",null,"maket1");//подключение бд

if($db->connect_error){
    exit($db->connect_error);
}

//$sql = "INSERT INTO fortest (title,date) VALUES ('первая запись',".time().")";
$sql = "INSERT INTO fortest (title,date) VALUES ('первая запись',".time()."),('вторая запись',".time()."),('третья запись',".time().")";

$res = $db->query($sql);

if(!$res){
    exit($db->error);
}



?>


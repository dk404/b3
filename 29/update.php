<?php
$db =new mysqli("localhost","root",null,"maket1");//подключение бд

if($db->connect_error) {
    exit($db->connect_error);
}



$sql = "UPDATE fortest SET title = 'Новое значение для title2', date=".strtotime("02.03.2014")." WHERE ID=2";

$resUpdate = $db->query($sql);
if(!$resUpdate){
    exit($db->error);
}



?>


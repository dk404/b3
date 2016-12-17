<?php
$db =new mysqli("localhost","root",null,"maket1");//подключение бд

if($db->connect_error) {
    exit($db->connect_error);
}



$sql = "DELETE FROM fortest WHERE ID=3";

$resDelete = $db->query($sql);
if(!$resDelete){
    exit($db->error);
}



?>


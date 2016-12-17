<?php
$db = new mysqli("localhost", "root", null, "b3");

if($db->connect_error)
{
    exit($db->connect_error);
}


$sql = "UPDATE forTest SET title = 'Новое значение для поля title', date = ".strtotime("17.12.2016")." WHERE ID = 1";

$resUpdate = $db->query($sql);
if(!$resUpdate)
{
    exit($db->error);
}

<?php
$db = new mysqli("localhost", "root", null, "b3");

if($db->connect_error)
{
    exit($db->connect_error);
}


$sql = "DELETE FROM forTest WHERE ID = 1";

$resFromDb = $db->query($sql);
if(!$resFromDb)
{
    exit($db->error);
}

<?php
$db = new mysqli("localhost", "root", null, "b3");

if($db->connect_error)
{
    exit($db->connect_error);
}

//все поля * - можно указать вместо всех названий полей
//$sql = "SELECT date, ID, title FROM forTest WHERE ID >= 1 AND (title != '' AND date < ".strtotime("1.1.2014").")";
$sql = "SELECT date, ID, title FROM forTest WHERE ID >= 1 LIMIT 1, 2"; //LIMIT позволяет ограничить кол-во штук на вывод
$sql = "SELECT date, ID, title FROM forTest WHERE ID >= 1 ORDER BY title ASC"; //ORDER BY имя поля + asc - по возростанию, desc - по убыванию

$resFromDb = $db->query($sql);

if(!$resFromDb)
{
    exit($db->error);
}

if($resFromDb->num_rows < 1)
{
    exit("Совпадений нет");
}

//$result             = $resFromDb->fetch_array();
//$result2_assoc      = $resFromDb->fetch_assoc();
//$result3_row        = $resFromDb->fetch_row();
$result4_all        = $resFromDb->fetch_all(MYSQLI_ASSOC);
//$result5_object     = $resFromDb->fetch_object();
//$result5_object2     = $resFromDb->fetch_object();

var_dump($result4_all);


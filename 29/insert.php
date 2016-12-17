<?php

$db = new mysqli("localhost", "root", null, "b3");

if($db->connect_error)
{
    exit($db->connect_error);
}

$arr = [
    "tableName" => "forTest",
    "columnNames" => "title, date",
    "val" => [
        ["title для певой записи", strtotime("1.12.2015")],
        ["title для второй записи", strtotime("1.12.2014")],
        ["title для третей записи", strtotime("1.12.2012")],
        ["title для четв записи", strtotime("1.12.2010")]
    ]
];


foreach ($arr["val"] as $key => $value) {
    $arr["val"][$key] = "'".implode("','", $value)."'";
}



$sql = "INSERT INTO ".$arr["tableName"]." (".$arr["columnNames"].") VALUES (".implode("),(", $arr["val"]).")";

$resInsert = $db->query($sql);
if(!$resInsert)
{
    exit($db->error);
}



<?php

$db =new mysqli("localhost","root",null,"maket1");//подключение бд

if($db->connect_error) {
    exit($db->connect_error);
}

$arr=[
    "tableName"=>"fortest",
    "columnNames"=>"title, date",
    "val"=>[
        ["title для первой записи",strtotime("1.02.2012")],
        ["title для второй записи",strtotime("21.01.2014")],
        ["title для третьей записи",strtotime("13.12.2016")]
    ]
];

foreach($arr["val"] as $key => $value){
    $arr["val"][$key] = "'".implode("','", $value)."'";
}

$sql = "INSERT INTO ".$arr["tableName"]." (".$arr["columnNames"].") VALUES (".implode("),(",$arr["val"]).")";

$resInsert = $db->query($sql);
if(!$resInsert){
    exit($db->error);
}



$sql = "INSERT INTO ".$arr["tableName"]." (".$arr["columnNames"].") VALUES (".implode("),(",$arr["val"]).")";

$resInsert = $db->query($sql);
if(!$resInsert){
    exit($db->error);
}






?>


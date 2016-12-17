<?php

$maketdatabase= new mysqli("localhost","root",null, "maketdatabase");


if ($maketdatabase->connect_error){

    exit($maketdatabase->connect_error);
}

$arr = [
    "tablename"=> "fortest",
    "columnames"=> "title, date",
    "columvalues"=> [
        ["title1", strtotime("1.08.2010")],
        ["title2", strtotime("1.09.2012")],
        ["title3", strtotime("2.10.2015")],
        ["title4", strtotime("3.12.2018")],

    ]

];

foreach ($arr["columvalues"] as $key=> $value ){
    $arr["columvalues"][$key] = "'".implode("','", $value)."'";


}

$sql = "INSERT INTO ".$arr["tablename"]." (".$arr["columnames"].") VALUES (".implode("),(", $arr["columvalues"]).")";
if (!$resInsert = $maketdatabase->query($sql)){
    exit($maketdatabase->error);
}

?>


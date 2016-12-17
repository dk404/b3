<?php

$maketdatabase= new mysqli("localhost","root",null, "maketdatabase");


if ($maketdatabase->connect_error){

    exit($maketdatabase->connect_error);
}

$sql = "UPDATE fortest SET title ='marrow', date = ".strtotime("17.12.2016")." WHERE ID = 2";

$resupdate = $maketdatabase->query($sql);

if (!$resupdate){

    exit($maketdatabase->error);
}

?>


<?php

$maketdatabase= new mysqli("localhost","root",null, "maketdatabase");


if ($maketdatabase->connect_error){

    exit($maketdatabase->connect_error);
}

$sql = "DELETE FROM fortest WHERE ID = 12";

$resdatabase = $maketdatabase->query($sql);

if (!$resdatabase){

    exit($maketdatabase->error);
}

?>


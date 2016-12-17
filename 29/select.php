<?php


$maketdatabase= new mysqli("localhost","root",null, "maketdatabase");


if ($maketdatabase->connect_error){

    exit($maketdatabase->connect_error);
}

$sql = "SELECT ID, title  FROM fortest WHERE ID >= 2";

$resfromdatabase = $maketdatabase->query($sql);

if (!$resfromdatabase) {

    exit($maketdatabase->error);
}

if ($resfromdatabase->num_rows == 0){

    exit("совпадений нет");
}

    $result_all= $resfromdatabase->fetch_all(MYSQLI_ASSOC);

var_dump($result_all);



?>


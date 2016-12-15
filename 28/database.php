<?php

$maketdatabase= new mysqli("localhost","root",null, "maketdatabase");


if ($maketdatabase->connect_error){

    exit($maketdatabase->connect_error);
 }

// $sql="INSERT INTO fortest (title, date) VALUES ('Запись', ".time().")";

    $sql="INSERT INTO fortest (title, date) VALUES ('Запись', ".time()."), ('запись2', ".time()."), ('Marrow', ".time().")";

$res=$maketdatabase->query($sql);


    if(!$res){
        exit($maketdatabase->error);
}

?>


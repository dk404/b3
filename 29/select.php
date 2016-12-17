<?php
$db =new mysqli("localhost","root",null,"maket1");//подключение бд

if($db->connect_error) {
    exit($db->connect_error);
}



$sql = "SELECT date, ID FROM fortest WHERE ID > 2";

$resFromDb = $db->query($sql);
if(!$resFromDb){
    exit($db->error);
}

if($resFromDb->num_rows < 1){
    exit("Совпадений нет");
}

$result4_all = $resFromDb->fetch_all(MYSQLI_ASSOC);

var_dump($result4_all);





?>


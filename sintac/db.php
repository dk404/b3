<?php



/*
База данных (MySQL)
Синтаксис
mysqli

$db=new_mysqli(host,username,password,basedate)


*/


//Подключение к базе данных( проверка)
$db=new mysqli(
            "127.0.0.1"
           ,"root"
           , null
           ,"maket1"
);
    if ($db->connect_error){
    exit($db->connect_error);
}

//Добавить в таблицу

//$sql= "INSERT INTO for_test (TITLE,DATE) VALUES ('Прувет', ".time().")"; ->первый способ
$sql= "INSERT INTO for_test (TITLE,DATE) VALUES ('УУУУУ', ".time()."),('РРРРРР', ".time()."),('ПППППП',".time().")";

$res = $db->query($sql);
    if(!$res){
        exit($db->error);
    }

?>


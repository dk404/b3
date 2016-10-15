<?php
require_once("DB.php");

if($_POST["method_name"] == "register")
{

    $arr = [
        "user_name" => $_POST["login"]
       ,"pass"      => $_POST["pass"]
    ];


    $sql = "SELECT * FROM users WHERE user_name = '".$_POST["login"]."' AND pass = ".$_POST["pass"];
    $resDb = db_select($sql)["result"];
    if($resDb){
        exit("Такой пользователь уже есть");
    }

    $resDb = db_insert("users", $arr);
    if($resDb["error"]){
        exit($resDb["error_text"]);
    }
    else
    {
        $responseText = "Регистрация прошла успешно.";
    }

}



?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title></title>
    <link rel="shortcut icon" href=""/>
    <link rel="stylesheet" type="text/css" media="all" href=""/>

    <script type="text/javascript" src=""></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


</head>

<body>

<? if(!$responseText){ ?>


<form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
    <input type="hidden" name="method_name" value="register">

    <h3>Регистрация</h3>

    <input type="text" name="login" value="" placeholder="login"/><br><br>
    <input type="password" name="pass" value="" placeholder="pass"/><br><br>

    <input name="submit" type="submit" value="готово"/>
</form>
<? }else{ ?>

    <h3><? echo $responseText; ?></h3>

<? } ?>


</body>
</html>


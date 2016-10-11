<?php
session_start();
if($_POST["method_name"] == "auth")
{
    $_SESSION["login"] = $_POST["login"];
    $_SESSION["pass"] = $_POST["pass"];
}

if($_GET["del_session"]){
    unset($_SESSION["login"], $_SESSION["pass"]); //unset - удалить переменную, массив итд. Освободить память
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

<form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
    <input type="hidden" name="method_name" value="auth">

    <p>Авторизация</p>
    <input type="text" name="login" value="" placeholder="login"/><br><br>
    <input type="password" name="pass" value="" placeholder="password"/><br><br>

    <input name="submit" type="submit" value="Войти"/>
</form>

<? if($_SESSION){ ?>
    <hr>
    <a href="http://b3/03/session.php?del_session=1">Удалить сессию</a>
<? } ?>




</body>
</html>


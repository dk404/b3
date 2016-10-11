<?php
if($_POST["method_name"] == "auth")
{

    setcookie("login", $_POST["login"], strtotime("+5 min"), "/", false );
    setcookie("pass", $_POST["pass"], strtotime("+5 min"), "/", false );



}

if($_GET["del_cookie"]){
    setcookie("login", 1, strtotime("-5 min"), "/", false );
    setcookie("pass", 1, strtotime("-5 min"), "/", false );
}

var_dump($_COOKIE);
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

<p>Авторизация</p>
<form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
    <input type="hidden" name="method_name" value="auth">

    <p>Авторизация</p>
    <input type="text" name="login" value="" placeholder="login"/><br><br>
    <input type="password" name="pass" value="" placeholder="password"/><br><br>

    <input name="submit" type="submit" value="Войти"/>
</form>

<? if($_COOKIE["login"]){ ?>
    <hr>
    <a href="http://b3/03/cookie.php?del_cookie=1">Удалить куку</a>
<? } ?>

</body>
</html>

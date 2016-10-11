<?php

if($_GET){

    $tmp = "Вы вошли как: " . $_GET["login"] . ". Под паролем: " . $_GET["pass"];
    echo $tmp;


//    var_dump($_GET);

}


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title>GET & POST</title>
    <link rel="shortcut icon" href=""/>
    <link rel="stylesheet" type="text/css" media="all" href=""/>

    <script type="text/javascript" src=""></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


</head>

<body>


<? if($_GET){ ?>
    <a href="http://b3/03/index.php">Вернуться</a>
<? } ?>


<? if($_GET["type_page"] == "auth"){ ?>

<form action="" method="get" enctype="multipart/form-data" name="myForm" target="_self">

    <p>Авторизация</p>
    <input type="text" name="login" value="" placeholder="login"/><br><br>
    <input type="password" name="pass" value="" placeholder="password"/><br><br>

    <input name="submit" type="submit" value="Войти"/>
</form>


<? } else if ($_GET["type_page"] == "users"){ ?>

    <ul>
        <li>
            <a href="#">Чувак 1</a>
        </li>
        <li>
            <a href="#">Чувак 2</a>
        </li>
        <li>
            <a href="#">Чувак 3</a>
        </li>
        <li>
            <a href="#">Чувак 4</a>
        </li>
        <li>
            <a href="#">Чувак 5</a>
        </li>
    </ul>



<? } else { ?>

    <ul>
        <li>
            <a href="http://b3/03/index.php?type_page=auth">Перейти к авторизации</a>
        </li>
        <li>
            <a href="http://b3/03/index.php?type_page=users">Открыть список пользователей</a>
        </li>
    </ul>


<? } ?>




</body>
</html>


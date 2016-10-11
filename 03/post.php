<?php

if($_POST){




    switch ($_POST["method_name"]):
        case "auth":

                echo "Вы авторизовались";


            break;
        case "register":

            if($_FILES['avatar']['tmp_name']):
                $filename = $_FILES['avatar']['tmp_name'];
            endif;

            break;
        default: echo "не то и не это";
    endswitch;




////    $tmp = "Вы вошли как: " . $_GET["login"] . ". Под паролем: " . $_GET["pass"];
////    echo $tmp;
//    $login = $_POST["login"];
//
//
//    var_dump($_REQUEST);

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


<p>Авторизация</p>

<form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
    <input type="hidden" name="method_name" value="auth">


    <input type="text" name="login" value="" placeholder="login"/><br><br>
    <input type="password" name="pass" value="" placeholder="password"/><br><br>

    <input name="submit" type="submit" value="Войти"/>
</form>

<hr>

<p>регистрация</p>
<form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
    <input type="hidden" name="method_name" value="register">

    <input type="text" name="login" value="" placeholder="login"/><br><br>
    <input type="password" name="pass" value="" placeholder="password"/><br><br>
    <input type="file" name="avatar" /><br><br>
    <input type="file" name="ziiiiopp" /><br><br>

    <input name="submit" type="submit" value="Войти"/>
</form>

<? if($filename){ ?>
    <img src="<? echo $filename; ?>" align="right" width="200" alt="">
<? } ?>









</body>
</html>


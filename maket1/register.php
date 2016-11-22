<?php
/*------------------------------
подключение библиотек
-------------------------------*/
require_once("autoload.php");

$T_check    = new TextSecurity();

/*------------------------------
если была передана форма
-------------------------------*/
if($_POST["method_name"] == "register")
{
    if($_POST["email"] and $_POST["pass"])
    {
        if(!$T_check->check_email($_POST["email"]))
        {
            exit("Неверный e-mail");
        }

        


    }
    else{
        exit("Все поля должны быть заполнены");
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

<form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
    <input type="hidden" name="method_name" value="register">

    <h3>Регистрация</h3>

    <input type="text" name="email" value="" placeholder="email"/><br><br>
    <input type="password" name="pass" value="" placeholder="pass"/><br><br>

    <input name="submit" type="submit" value="регистрация"/>
</form>




</body>
</html>
<?php
/*------------------------------
подключение библиотек
-------------------------------*/
require_once("autoload.php");

$DB      = new DB();
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

        //сначала проверим есть ли уже такой пользователь, если нет, то запишем
        $sql = "SELECT * FROM users WHERE email = '".$_POST["email"]."'";
        $resSelect = $DB->select($sql);

        if ($resSelect["result"] and $resSelect["result"][0]["confirm_email"] == 1)
        {
            exit("Такой пользователь уже существует");
        }
        elseif($resSelect["result"] and $resSelect["result"][0]["confirm_email"] == 0)
        {
            exit("Такой пользователь уже существует, но необходимо подтвердить email");
        }


        //ФОРМИРУЕМ ДАННЫЕ ДЛЯ ЗАПИСИ В БАЗУ
        $arr = [
            "email"          => $_POST["email"]
            ,"pass"          => password_hash($_POST["pass"], PASSWORD_DEFAULT)
            ,"token"         => md5(time().rand())
//            ,"confirm_email" =>
//            ,"status"        =>
            ,"date"          => time()
        ];





        //записываем данные в таблицу
        $resInsert = $DB->insert("users", $arr, $close=false);






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
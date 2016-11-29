<?php

require_once("autoload.php");

$DB       = new DB();
$T_check  = new TextSecurity();


if($_POST["method_name"] == "login") {

    if ($_POST["email"] and $_POST["pass"])
    {
        if (!$T_check->check_email($_POST["email"])) {
            exit("Неверный e-mail");
        }

        //делаем выборку
        $sql = "SELECT * FROM users WHERE email = '".$_POST["email"]."'";
        $resSelect = $DB->select($sql);

        if (!$resSelect["result"])
        {
            exit("Такого пользователя не существует");
        }
        elseif($resSelect["result"] and $resSelect["result"][0]["confirm_email"] == 0)
        {
            exit("Такой пользователь уже существует, но необходимо подтвердить email");
        }

        //создаём cookie
        setcookie("user_id", $resSelect["result"][0]["ID"], strtotime("+1 week"), "/maket1/");
        setcookie("token", $resSelect["result"][0]["token"], strtotime("+1 week"), "/maket1/");

        header("Location: index.php"); exit();


    }
    else
    {
        echo("Поля заполнены неверно");

    }


}

?>

<h2>"Login"</h2> <br>

<form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
    <input type="hidden" name="method_name" value="login">

    <input type="text" name="email" value="" placeholder="email"/><br><br>
    <input type="password" name="pass" value="" placeholder="password"/><br><br>

    <input name="submit" type="submit" value="sign in"/>
</form>

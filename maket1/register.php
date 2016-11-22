<?
require_once"autoload.php";
$CheckText = new TextSecurity();


if($_POST["method_name"])
{
    if($_POST["email"] && $_POST["pass"])
    {
        if(!$CheckText->check_email($_POST["email"])){ exit("Ваш mail аывлыалывфд"); }
    }
    else
    {
        exit("Все поля должны заполнены");
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

        <input name="submit" type="submit" value="готово"/>
    </form>


</body>
</html>


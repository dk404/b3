<?php
require_once "../autoload.php";
$DB = new DB();
$MAIL = new library\mail\Mail("utf-8");
$PATH = new library\Path();
$CheckText = new TextSecurity();


// Ловим форму
if($_POST["email"] and $_POST["pass"]) {

    //проверка данных
    $email = $CheckText->check_email($_POST["email"]);
    if(!$email){ exit("incorrect email"); }

    // Существует ли такой имейл в базе,
    $checkEmail = $DB->select("SELECT ID FROM  confirmemail WHERE email='".$email."' AND status=1");

    if(!$checkEmail["error"] or $checkEmail["error"] != 1 ){
        if(!$checkEmail["error"] ){exit ("user already exist");}
        else{
            exit($checkEmail["error_text"]);
        }
    }

    //Добавление имейлов в таблицы
    $token = md5(time().rand());
    $arr = [
        "email"=>$email,
        "token"=> $token
    ];
    $resDb = $DB->insert("confirmemail",$arr);
    if(!$resDb["result"]){exit("Ошибка при записи в базу");}

    //-
    $arr = [
        "email"=>$email,
        "pass"=> password_hash($_POST["pass"],PASSWORD_DEFAULT)
    ];
    $resDb = $DB->insert("users",$arr);
    if(!$resDb["result"]){exit("Ошибка при записи в базу");}


    //send confirming mail
    $mailHtml = "<H1>Approve your email</H1> <p>To complete registration click on url <a href=".$PATH->clear_url("/maket1/")."Auth/confirm.php?token=".$token.">".$PATH->clear_url("/maket1/")."Auth/confirm.php?token=".$token." </a></p>";
    $MAIL->To($email);
    $MAIL->Subject("Подтверждение");
    $MAIL->Body($mailHtml, "html");
    $MAIL->Send();



}
else if($_POST["email"] and !$_POST["pass"]){
    exit("pass can't be empty");
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
    <h1>Registration</h1>
    <form action="" method="post"  enctype="multipart/form-data">
        <input type="text" name="email" placeholder="Впишите имейл" > <br><br>

        <input type="password" name="pass"  placeholder="пароль">
        <br><br>
        <input type="submit" name="submit"  value="Ok">
    </form>



</body>




</html>
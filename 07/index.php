<?php
require_once("library/DB.php");
$DB = new DB();


if($_POST["method_name"])
{
    switch ($_POST["method_name"]):
        case "register":

            $login = addslashes($_POST["login"]);



            $resDb = $DB->insert("users", ["user_name" => $_POST["login"], "pass" => $_POST["pass"]]);
            $responseFromDb["error"]    = ($resDb["error_text"])? $resDb["error"] : false;
            $responseFromDb["succes"]   = ($resDb["result"])? true : false;
        break;

        case "login":



            $resDb = $DB->select("SELECT * FROM users WHERE user_name = '".$_POST["login"]."'AND pass ='".$_POST["pass"]."'");
            $responseFromDb["error"]    = ($resDb["error"])? $resDb["error_text"] : false;
            $responseFromDb["succes"]   = ($resDb["result"])? $resDb["result"] : false;


        break;

    endswitch;
}



?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title></title>
    <link rel="shortcut icon" href=""/>
<!--    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" media="all" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


</head>

<body>

<main>

    <? require_once "blocks/header.php"; ?>


    <? if(!$_GET["r"]){ ?>
        <section id="welcome">
            <h1>hello dear friend</h1>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid, at blanditiis consequuntur dolore
                eaque enim est neque omnis quas quod soluta temporibus voluptatem! Aliquam est inventore iste nemo sequi!</p>
        </section>
    <? } ?>

    <?
    switch ($_GET["r"]):
        case "login": require_once("blocks/login.php"); break;
        case "register": require_once("blocks/register.php"); break;
        case "users": require_once("blocks/users.php"); break;
    endswitch;
    ?>
</main>





<script type="text/javascript" src=""></script>
</body>
</html>


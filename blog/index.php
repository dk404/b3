<?php
require_once("library/DB.php");
require_once("library/TextSecurity.php");
require_once("library/Auth.php");

$DB         = new DB();
$AUTH       = new Auth();
$T_check    = new TextSecurity();

/*------------------------------
Если был передан logout
-------------------------------*/
if($_GET["r"] == "logout")
{
    setcookie("user_id", 1, strtotime("-1 week"), "/blog/");
    setcookie("token", 1, strtotime("-1 week"), "/blog/");

    header("Location: index.php"); exit();
//    echo "<script type='text/javascript'>  location.href = 'index.php';  </script>"; exit();

}





/*------------------------------
Если была передана форма
-------------------------------*/
if($_POST["method_name"])
{
    switch ($_POST["method_name"]):
        case "register":

            if(!$_POST["login"] or !$_POST["pass"])
            {
                $responseFromDb["error"] = "Не верно заполненны поля";
//                echo "<script type='text/javascript'>alert('".$responseFromDb["error"]."');</script>";
            }
            else
            {
                $login = $T_check->check1($_POST["login"]);
                $pass  = password_hash($_POST["pass"], PASSWORD_DEFAULT);

                $resDb = $DB->insert("users", ["user_name" => $login, "pass" => $pass]);
                $responseFromDb["error"]    = ($resDb["error"])? $resDb["error_text"] : false;
                $responseFromDb["succes"]   = ($resDb["result"])? true : false;


                $resmail = mail("bla@bla.com", "спасибо за регистрацию", "bla bla очень много bla");

            }



        break;

        case "login":

            if(!$_POST["login"] or !$_POST["pass"])
            {
                $responseFromDb["error"] = "Не верно заполненны поля";
//                echo "<script type='text/javascript'>alert('".$responseFromDb["error"]."');</script>";
            }
            else {
                $login = $T_check->check1($_POST["login"]);


                //найдем указанного пользователя
                $resUser = $DB->select("SELECT * FROM users WHERE user_name = '".$login."'");
                if($resUser["error"])
                {
                    $responseFromDb["error"] = "Такого пользователя нет";
                }
                else
                {
                    $verify  = password_verify($_POST["pass"], $resUser['result'][0]['pass']);
                    if(!$verify)
                    {
                        $responseFromDb["error"] = "Неверный пароль";
                    }
                    else
                    {
                        setcookie("user_id", $resUser['result'][0]['ID'], strtotime("+1 week"), "/blog/");
                        setcookie("token", $resUser['result'][0]['pass'], strtotime("+1 week"), "/blog/");
                        header("Location: index.php");
                    }


                }



            }

        break;

    endswitch;
}


/*------------------------------
Проверить на авторизован или нет пользователь
-------------------------------*/
$auth = $AUTH->auth_check($DB);



?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title></title>
    <link rel="shortcut icon" href=""/>
<!--    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" media="all" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="js/sweetalert/sweetalert.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="js/sweetalert/sweetalert-dev.js"></script>
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







</body>
</html>


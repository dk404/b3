<?php
require_once "library/DB.php";
$DB = new DB();

if($_POST["method_name"])
{
    switch ($_POST["method_name"]):
        case "blog_add":
            $resDb = $DB->insert("blog", ["title" => $_POST["title"], "descr" => $_POST["descr"], "text" => $_POST["text"]]);
            $responseFromDb["error"]    = ($resDb["error_text"])? $resDb["error"] : false;
            $responseFromDb["succes"]   = ($resDb["result"])? true : false;
            break;

        case "blog_edit":

            $resDb = $DB->update("blog", ["title" => $_POST["title"], "descr" => $_POST["descr"], "text" => $_POST["text"]], "ID = ".$_POST["ID"]);
            $responseFromDb["error"]    = ($resDb["error"])? $resDb["error_text"] : false;
            $responseFromDb["succes"]   = ($resDb["result"])? $resDb["result"] : false;


            break;

    endswitch;
}

/*-----------------------------------
Удалить запись
-----------------------------------*/
if($_GET["del"]){
    $resDb = $DB->delete("blog", "ID = ".$_GET["del"]);
}

/*-----------------------------------
Выведем все записи
-----------------------------------*/
$resItems = $DB->select("SELECT * FROM blog ORDER BY ID DESC", true)["result"];

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
    <? require_once "blocks/header.php" ?>

    <section id="Blog">

        <div class="addBtn">
            <a href="blog.php?r=add">add item</a>
        </div>



        <div class="forError">
            <? if( $responseFromDb["error"]){echo $responseFromDb["error"];} ?>
        </div>

        <? switch ($_GET["r"]):
            case "edit":
            case "add": require "blocks/blog/add.php"; break;
        endswitch; ?>




        <? if($resItems): ?>
        <ul class="blogItems">
            <? foreach ($resItems as $resItem) { ?>
            <li>
                <h3><? echo $resItem["title"] ?></h3>

                <div class="forDesc"><? echo $resItem["descr"] ?></div>

                <div class="forAdm">
                    <a href="blog.php?r=edit&ID=<? echo $resItem["ID"] ?>">edit</a>
                    <a href="blog.php?del=<? echo $resItem["ID"] ?>">delete</a>
                </div>

            </li>
            <? } ?>
        </ul>
        <? endif; ?>
    </section>
    
</main>

<script type="text/javascript" src=""></script>
</body>
</html>


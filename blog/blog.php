<?php
require_once("library/DB.php");
require_once("library/TextSecurity.php");
require_once("library/Auth.php");
require_once("library/Nav.php");

$DB         = new DB();
$AUTH       = new Auth();
$T_security = new TextSecurity();
$NAV        = new Nav();

/*------------------------------
Основные vars
-------------------------------*/
$auth = $AUTH->auth_check($DB);


/*------------------------------
Если была передана форма
-------------------------------*/
if($_POST["method_name"])
{
    switch ($_POST["method_name"]):
        case "blog_add":
            $resDb = $DB->insert("blog", ["title" => $_POST["title"], "descr" => $_POST["descr"], "text" => $_POST["text"]]);
            $responseFromDb["error"]    = ($resDb["error_text"])? $resDb["error"] : false;
            $responseFromDb["succes"]   = ($resDb["result"])? true : false;
            break;

        case "blog_edit":

            $title = $T_security->check1($_POST["title"]);



            $resDb = $DB->update("blog", ["title" => $T_security->check1($_POST["title"]), "descr" => $_POST["descr"], "text" => $_POST["text"]], "ID = ".$_POST["ID"]);
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
$forNav = [
    "limit"         => 5
    ,"page"         => @$_GET["page"]
    ,"posts"        => $DB->select("SELECT COUNT(*) AS n FROM blog")["result"][0]["n"]
    ,"max_pages"    => 2
];

$resNav = $NAV->get_nav($forNav);
$resItems = $DB->select("SELECT * FROM blog ORDER BY ID DESC LIMIT ".$resNav["start"].", ".$resNav["limit"], true)["result"];





?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title>Blog</title>
    <link rel="shortcut icon" href=""/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<!--    <script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>-->

    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckeditor/adapters/jquery.js"></script>
    <script type="text/javascript" src="js/forEditor.js"></script>

</head>

<body>

<main>
    <? require_once "blocks/header.php" ?>

    <section id="Blog">

        <? if($auth){ ?>
            <div class="addBtn mY35">
                <a href="blog.php?r=add"><i class="material-icons">add</i></a>
            </div>
        <? } ?>



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
                <h3><a href="#"><? echo $resItem["title"] ?></a></h3>

                <div class="forDesc"><? echo $resItem["descr"] ?></div>

                <? if($auth){ ?>
                <div class="forAdm mt20">
                    <a class="a_universal" href="blog.php?r=edit&ID=<? echo $resItem["ID"] ?>">edit</a>
                    <a class="a_universal" href="blog.php?del=<? echo $resItem["ID"] ?>">delete</a>
                </div>
                <? } ?>

            </li>
            <? } ?>
        </ul>


            <? if($resNav['stack']){ ?>
            <section class="postrNav mt50">
                <ul>
                    <? if($resNav['stack']['first']){ ?><li class="first"><a href="blog.php?page=<? echo $resNav['stack']['first'] ?>"> <i class="material-icons">first_page</i> </a></li><? } ?>
                    <? if($resNav['stack']['prev']){ ?><li class="prev"><a href="blog.php?page=<? echo $resNav['stack']['prev'] ?>"> <i class="material-icons">chevron_left</i> </a></li><? } ?>
                    <? if($resNav['stack']['left']){
                    foreach ($resNav['stack']['left'] as $item) {  ?>
                        <li class="item"><a href="blog.php?page=<? echo $item ?>"><? echo $item ?></a></li>
                    <? }}?>
                    


                    <li class="center"><? echo $resNav['stack']['center'] ?></li>

                    <? if($resNav['stack']['right']){
                    foreach ($resNav['stack']['right'] as $item) {  ?>
                        <li class="item"><a href="blog.php?page=<? echo $item ?>"><? echo $item ?></a></li>
                    <? }} ?>

                    <? if($resNav['stack']['next']){ ?><li class="next"><a href="blog.php?page=<? echo $resNav['stack']['next'] ?>"> <i class="material-icons">chevron_right</i> </a></li><? } ?>
                    <? if($resNav['stack']['last']){ ?><li class="last"><a href="blog.php?page=<? echo $resNav['stack']['last'] ?>"> <i class="material-icons">last_page</i> </a></li><? } ?>



                </ul>
            </section>
            <? } ?>




        <? endif; ?>
    </section>


    <div style="height: 100px;"></div>

</main>

<script type="text/javascript" src=""></script>
</body>
</html>


<?php
require_once("autoload.php");

$DB         = new DB();
$AUTH       = new Auth();
$T_security = new TextSecurity();
$NAV        = new Nav();
$PATH       = new library\Path();
$PhotoConverter = new library\photo\SimpleImage(null);
$FCheck         = new library\file\CheckUploadFiles();


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

            //Проверим данные
            $title = $T_security->check1($_POST["title"]);
            $descr = $T_security->check2($_POST["descr"]);
            $text = $T_security->check2($_POST["text"]);

            if(!$title)
            {
                $responseFromDb["error"] = "Ошибка, пустой заголовок";

            }
            else
            {

                if($_FILES["photo"]["tmp_name"])
                {
                    $resCheck = $FCheck->checkOne($_FILES, "photo", "image", "3m");
                    if($resCheck["error"])
                    {
                        $responseFromDb["error"] = $resCheck["error"];
                    }
                    else
                    {
                        $filename = md5(time().rand()).$resCheck["ext"];

                        if(!is_dir("FILES/big")){  mkdir("FILES/big", 0777, true); }
                        if(!is_dir("FILES/small")){  mkdir("FILES/small", 0777, true); }

                        try{

                            $img = $PhotoConverter->load($resCheck["file"]);
                            $img->best_fit(500, 350)->save("FILES/big/".$filename, 90);
                            $img->best_fit(120, 120)->save("FILES/small/".$filename, 90);

                        }catch (Exception $e)
                        {
                            $responseFromDb["error"] = $e->getMessage();
                        }


                    }
                }
                else
                {
                    $filename = null;
                }



                if(!$responseFromDb["error"])
                {

                    $arrToDb = [
                        "title"     => $title
                        , "descr"   => $descr
                        , "text"    => $text
                        , "photo"   => $filename

                    ];

                    $resDb = $DB->insert("blog", $arrToDb);
                    $responseFromDb["error"]    = ($resDb["error_text"])? $resDb["error"] : false;
                    $responseFromDb["succes"]   = ($resDb["result"])? true : false;

                }



            }


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
    <link rel="stylesheet" type="text/css" media="all" href="<? echo $PATH->clear_url('/blog/') ?>css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<!--    <script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>-->

    <script type="text/javascript" src="<? echo $PATH->clear_url('/blog/') ?>js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="<? echo $PATH->clear_url('/blog/') ?>ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<? echo $PATH->clear_url('/blog/') ?>ckeditor/adapters/jquery.js"></script>
    <script type="text/javascript" src="<? echo $PATH->clear_url('/blog/') ?>js/forEditor.js"></script>

</head>

<body>

<main>
    <? require_once "blocks/header.php" ?>

    <section id="Blog">

        <? if($auth){ ?>
            <div class="addBtn mY35">
                <a href="<? echo $PATH->withoutGet() ?>?r=add"><i class="material-icons">add</i></a>
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
                <h3><a href="#"><? echo $resItem["title"] ?></a>

                    <? if($resItem["photo"]){ ?>
                        <a target="_blank" href="<? echo "FILES/big/".$resItem["photo"] ?>">
                            <img src="<? echo "FILES/small/".$resItem["photo"] ?>" align="right">
                        </a>
                    <? } ?>
                </h3>

                <div class="forDesc"><? echo $resItem["descr"] ?></div>

                <? if($auth){ ?>
                <div class="forAdm mt20">
                    <a class="a_universal" href="<? echo $PATH->withoutGet() ?>?r=edit&ID=<? echo $resItem["ID"] ?>">edit</a>
                    <a class="a_universal" href="<? echo $PATH->withoutGet() ?>?del=<? echo $resItem["ID"] ?>">delete</a>
                </div>
                <? } ?>

            </li>
            <? } ?>
        </ul>


            <? if($resNav['stack']){ ?>
            <section class="postrNav mt50">
                <ul>
                    <? if($resNav['stack']['first']){ ?><li class="first"><a href="<? echo $PATH->withoutGet() ?>?page=<? echo $resNav['stack']['first'] ?>"> <i class="material-icons">first_page</i> </a></li><? } ?>
                    <? if($resNav['stack']['prev']){ ?><li class="prev"><a href="<? echo $PATH->withoutGet() ?>?page=<? echo $resNav['stack']['prev'] ?>"> <i class="material-icons">chevron_left</i> </a></li><? } ?>
                    <? if($resNav['stack']['left']){
                    foreach ($resNav['stack']['left'] as $item) {  ?>
                        <li class="item"><a href="<? echo $PATH->withoutGet() ?>?page=<? echo $item ?>"><? echo $item ?></a></li>
                    <? }}?>
                    


                    <li class="center"><? echo $resNav['stack']['center'] ?></li>

                    <? if($resNav['stack']['right']){
                    foreach ($resNav['stack']['right'] as $item) {  ?>
                        <li class="item"><a href="<? echo $PATH->withoutGet() ?>?page=<? echo $item ?>"><? echo $item ?></a></li>
                    <? }} ?>

                    <? if($resNav['stack']['next']){ ?><li class="next"><a href="<? echo $PATH->withoutGet() ?>?page=<? echo $resNav['stack']['next'] ?>"> <i class="material-icons">chevron_right</i> </a></li><? } ?>
                    <? if($resNav['stack']['last']){ ?><li class="last"><a href="<? echo $PATH->withoutGet() ?>?page=<? echo $resNav['stack']['last'] ?>"> <i class="material-icons">last_page</i> </a></li><? } ?>



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


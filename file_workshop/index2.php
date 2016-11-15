<?php
require_once "../blog/autoload.php";

$converter      = new library\ByteConverter();
$PhotoConverter = new library\photo\SimpleImage(null);
$FCheck         = new library\file\CheckUploadFiles();

$input_photo_name  = "photo";
$dirname           = "FILE";


    if($_POST["method_name"])
    {


       switch ($_POST["method_name"]):
           case "upload":

               if($_FILES[$input_photo_name]["tmp_name"])
               {

                   $resCheck = $FCheck->checkOne($_FILES, $input_photo_name, "image", "3m");
                   if($resCheck["error"])
                   {
                       exit($resCheck["error"]);
                   }
                   else
                   {
                       $filename = md5(time().rand()).$resCheck["ext"];

                       //проверим есть ли такая папка
                       $resDir = (!is_dir($dirname))? mkdir($dirname, 0777, true) : true ;

                       if($resDir)
                       {

                           //Проводим загрузку фото
                           try{
                               $img = $PhotoConverter->load($resCheck["file"]);
                               $img->best_fit(500,400)->save($dirname."/".$filename, 90);
                           }
                           catch(Exception $e)
                           {
                               $error = $e;
                               echo 'Error: ' . $e->getMessage();
                           }


                       }
                       else
                       {
                           exit("Проблема при создании папки");
                       }

                   }

               }
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
    <link rel="stylesheet" type="text/css" media="all" href=""/>

    <script type="text/javascript" src=""></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


</head>

<body>

<form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
    <input type="hidden" name="method_name" value="upload" />

    <input type="file" name="photo" />

    <input name="submit" type="submit" value="готово"/>
</form>


</body>
</html>


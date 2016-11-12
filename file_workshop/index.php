<?php
require_once "../blog/autoload.php";
$converter = new library\ByteConverter();
$PhotoConverter = new Upload(null);


$mimes = [
    "jpg" => "image/jpeg"
    ,"png" => "image/png"
    ,"gif" => "image/gif"
];

$input_photo_name = "photo";

$dirname = "FILE";


    if($_POST["method_name"])
    {


       switch ($_POST["method_name"]):
           case "upload":
               if($_FILES[$input_photo_name]["tmp_name"])
               {

                   //проверка на тип
                   if($mime = array_search($_FILES[$input_photo_name]["type"], $mimes))
                   {
                       //проверка на размер
                       $max_size = $converter->getBytes("2m");
                       if($_FILES[$input_photo_name]["size"] > $max_size)
                       {
                           $fileSize = round($converter->getMBytes($_FILES[$input_photo_name]["size"]."b"))."mb";
                           exit("Превышен размер: ".$fileSize );
                       }
                       else
                       {

                           $filename = md5(rand()).rand().".".$mime;

                           //проверим есть ли такая папка
                           if(!is_dir($dirname))
                           {
                               $resDir = mkdir($dirname, 0777, true);
                           }
                           else
                           {
                               $resDir = true;
                           }


                           if($resDir)
                           {
//                               if(!move_uploaded_file($_FILES[$input_photo_name]["tmp_name"], $dirname."/".$filename))
//                               {
//                                   exit("Не получилось загрузить файл");
//                               }
//                               else
//                               {
//                                   echo "Загрузка успешна";
//                               }

                            $PhotoConverter->upload($_FILES[$input_photo_name]["tmp_name"]);
                            if(!$PhotoConverter->uploaded)
                            {
                                exit("ошибка при загрузке файла");
                            }
                           else
                           {
                               $PhotoConverter->file_new_name_body   = $filename;
                               $PhotoConverter->image_convert        = "jpg";
                               $PhotoConverter->image_resize         = true;
                               $PhotoConverter->image_x              = 450;
                               $PhotoConverter->image_ratio_y        = true;

                               $PhotoConverter->process($dirname);
                               if ($PhotoConverter->processed) {
                                   echo 'Все прошло успешно';
                                   $PhotoConverter->clean();
                               } else {
                                   echo 'Ошибка : ' . $PhotoConverter->error;
                               }         
                           }



                           }
                           else
                           {
                               exit("Проблема при создании папки");
                           }
                       }

                   }

               }
           break;


       endswitch;

        $fdfd = 1;
    }


//    if(is_dir("FILE"))
//    {
//        unlink("FILE"); //удаление файла,а также удаление папки rmdir
//        unset($dirname); //удаляет переменные
//    }



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


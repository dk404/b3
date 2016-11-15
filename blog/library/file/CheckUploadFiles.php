<?php
/**
 * Created by PhpStorm.
 * User: sht-home
 * Date: 15.11.2016
 * Time: 14:42
 *
 * Список mime типов: http://www.gcmsite.ru/?pg=art&id=php-header-mime-types
 */

namespace library\file;

use library\ByteConverter; //Таким образом прикрепляются те классы, которые затем в коде могут быть использованы


class CheckUploadFiles
{

    private $response = [];

    private $types = ["image" => [
                                    "jpg" => "image/jpeg"
                                    ,"png" => "image/png"
                                    ,"gif" => "image/gif"
                                ]
                     ];


    /**
     * Проверка одного файла
     *
     * @param $F - $_FILES
     * @param string $inputName - имя input поля
     * @param null|string $type - "image"
     * @param null|string $size - "4m (m - мегабайт, k - килобайт, b - байт)"
     * @return array - [error || file, old_name, ext, mime]
     */
    public function checkOne($F, $inputName,  $type = null, $size = null)
    {

        //В первую очередь проверим есть ли ошибка
        if($F[$inputName]["error"])
        {
            $this->response["error"] = $this->fileErrors($F[$inputName]["error"]);
            return $this->response;
        }

        //проверка на размер файла
        if(!is_null($size))
        {
            $Conv = new ByteConverter();
            $max_size = $Conv->getBytes($size);
            if($F[$inputName]["size"] > $max_size )
            {
                $this->response["error"] = "Превышен размер файла. Максимальный размер: ".$size;
                return $this->response;
            }
        }

        //Проверка на тип файла
        if($type)
        {
            if(!$ext = array_search($F[$inputName]["type"], $this->types[$type]))
            {
                $this->response["error"] = "Не допустимый тип файла";
                return $this->response;
            }


        }


        //Если всё хорошо, то отправим результат проверки
        $this->response = [
            "file"      => $F[$inputName]["tmp_name"]
            ,"ext"      => (!$ext) ? strrchr($F[$inputName]["name"], ".") : ".".$ext
            ,"old_name" => $F[$inputName]["name"]
            ,"mime"     => $F[$inputName]["type"]
        ];

        return $this->response;


    }


    private function fileErrors($errorNum){

        $e = [

            1 => "Размер принятого файла превысил максимально допустимый размер, который задан директивой upload_max_filesize конфигурационного файла php.ini."
            ,2 => "Размер загружаемого файла превысил значение MAX_FILE_SIZE, указанное в HTML-форме."
            ,3 => "Загружаемый файл был получен только частично."
            ,4 => "Файл не был загружен."
            ,6 => "Отсутствует временная папка. Добавлено в PHP 5.0.3."
            ,7 => "Не удалось записать файл на диск. Добавлено в PHP 5.1.0."
            ,8 => "PHP-расширение остановило загрузку файла. PHP не предоставляет способа определить какое расширение остановило загрузку файла; в этом может помочь просмотр списка загруженных расширений из phpinfo(). Добавлено в PHP 5.2.0."

        ];

        return $e[$errorNum];
    }

}
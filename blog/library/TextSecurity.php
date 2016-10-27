<?php
/**
 * Created by PhpStorm.
 * User: sht_j
 * Date: 22.10.2016
 * Time: 11:36
 */
class TextSecurity
{
    /**
     * Полный экран
     * @param string $string - строка которая будет преобразована
     * @return string
     */
    public function check1($string)
    {
        $string = htmlspecialchars($string, ENT_QUOTES, "UTF-8", true);
        $string = str_replace("`", "&lsquo;", $string);
        $string = trim($string);

        return $string;
    }


    /**
     * Для админа, оставляем html
     * @return mixed|string
     */
    public function check2($string)
    {
        $string = addslashes($string);
        $string = str_replace("`",'&lsquo;', $string);
        $string = trim($string);

        return $string;
    }
    

}
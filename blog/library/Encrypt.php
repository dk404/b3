<?php

/**
 * Created by PhpStorm.
 * User: sht_j
 * Date: 25.10.2016
 * Time: 19:17
 */
class Encrypt
{

    private $key = "sf6f56sf5s6f56s5d sd sd343434 ,````W####dsdsdsd sd ";

    /**
     * Метод который зашифровывает текст
     * @param $string - текстовая строка
     * @return string
     */
    public function enCrypt($string, $addSlash = true)
    {
        $key = $this->key;

        //открываем модуль шифрования и получаем его дискриптор
        $td = mcrypt_module_open(MCRYPT_BLOWFISH,'',MCRYPT_MODE_CFB,'');
        //  получаем размер вектора шифрования на основе дискриптора.
        $iv_size = mcrypt_enc_get_iv_size($td);
        // Создание вектора шифрования
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        // открытие буфера обмена обмена для шифровки данных
        mcrypt_generic_init($td,$key,$iv);
        //  шифруем даные
        $crypt_text = mcrypt_generic($td,$string);
        //  закрываем буфер обмена и модуль
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);

        $res =  base64_encode($iv.$crypt_text);

        if($addSlash){$res = addslashes($res);}

        return $res;

    }


    /**
     * Разшифровать строку
     * @param $string - закодированный в base64 шифр
     * @param bool $removeSlash - нужно или не нужно убирать (/)
     * @return string
     */
    public function deCrypt($string, $removeSlash = true)
    {
        $key = $this->key;

        if($removeSlash){$string = stripslashes($string);}
        $string = base64_decode($string);

        $td = mcrypt_module_open(MCRYPT_BLOWFISH,'',MCRYPT_MODE_CFB,'');
        $iv_size1 = mcrypt_enc_get_iv_size($td);
        $iv1 = substr($string,0,$iv_size1);
        $crypt_text1 = substr($string,$iv_size1);
        mcrypt_generic_init($td,$key,$iv1);

        $text = mdecrypt_generic($td,$crypt_text1);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);

        return $text;

    }



}
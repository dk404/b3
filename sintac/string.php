<?php

//http://be2.php.net/manual/ru/ref.strings.php



//Возвращает позицию первого вхождения подстроки без учета регистра

$str = 'экранирование символов, произведенное функцией addcslashes';
$pos = stripos($str,"э");

if($pos!==false){

    echo "совпадение есть";
}

// Поиск, возврат вхождения в тексте

$email  = 'name@example.com';
$domain = strstr($email, '@');
echo $domain.'<br><br>'; // выводит @example.com

$user = strstr($email, '@', true); // Начиная с PHP 5.3.0
echo $user.'<br><br>'; // выводит name


//замена в тексте

$repl = str_replace($str,'символов','Сссыыка');
echo $repl;

?>


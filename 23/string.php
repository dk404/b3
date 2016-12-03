<?php
// http://www.php.net/ref.strings


$randomstring ="Строки играют большую роль, задачи на парсинг строк довольно часто встречаются в PHP , поэтому рассмотрим некоторые базовые функции работы со строками. Но прежде чем начать работу со строками, откроем файл...";
//   $findme=stripos($randomstring, "парсинг");

//if ($findme !== false){

  //  echo "Найдено '$findme' в строке '$randomstring'";

//}

$replacer= str_replace($randomstring, "парсинг", "43");

echo $replacer;

?>


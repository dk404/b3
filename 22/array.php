<?php

// Способ номер 1
$sallary = [
    "andrey"=>5500,
    "yarik"=>5000,
    "lena"=>7000,
    "sergey"=>30000
];

echo $sallary['yarik']."<br>";

echo $sallary[1]."<br>";
// Способ номер 2

$f_sallary = array(
    "andrey"=>10000,
    "yarik"=>30000,
    "lena"=>50000,
    "sergey"=>100000
);

echo $f_sallary['yarik']."<br>";

//комб. массив
// Если ключа нет, тогда выставляем его значение от 0 слева на права

$art = [
    1000,
    "yarik",
    "lena"=>505
];

echo $art["lena"];

// массив в массиве (многомерный массив)

$loft = [
  "sallary"=>[
      1=>'понедельник',
      2=>'вторник',
      3=>'среда'
  ],
     1=>'январь',
     2=>'февраль'

];

echo $loft["sallary"][3]."<br>";

//print_r($sallary)// выводит структуру массива( внутри)

//var_dump($sallary) // техническая информация, показывает какого типа значение структуру

// объединение массива

$c = array_merge($sallary,$f_sallary,$loft);

var_dump($c)
?>


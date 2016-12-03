<?php

$a=[
    "Days"=>[
        1=>"Monday",
        2=>"Tuesday",
        3=>"Wensday"
    ] ,
    "Month"=>[
        1=>"March",
        2=>"April",
        3=>"May"
    ]
];

echo $a["Days"][3]."<br>";

////собирает ключи
$c=array_keys($a);
//
//var_dump($c);
//
////собирает значения
//$c=array_values($a);
//
//var_dump($c);
//
////извлекает последний эл. из массива!!!
//$c=array_pop($a);
//
//var_dump($c);
//
////добавляет новый эл. в конец массива
//$a= array_push($c);
//
//var_dump($a);
//
////
//$c=array_shift($a);
//
//var_dump($c);
//
////
//$c=array_flip($a);



?>


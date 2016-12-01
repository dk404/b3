<?php

//способ 1 (начиная с версии PHP 5.4)

$Salary=[
    "Andrey"=>5500,
    "Lena"  =>7000,
    "Yarik" =>5000,
    "Sergey"=>30000
];

echo $Salary["Lena"]."<br>";


//способ 2

$f_Salary=array(
    "Andrey"=>10000,
    "Lena"  =>50000,
    "Yarik" =>30000,
    "Sergey"=>100000
);

echo $f_Salary["Lena"]."<br>";
echo $Salary[0]."<br>";

//комбинированный массив

$Job=[
    100,
    "bla",
    "Lena"=>1000
];

echo $Job["Lena"]."<br>";


//массив в массиве - многомерный

$a=[
  "Salary"=>[
      1=>"Monday",
      2=>"Tuesday",
      3=>"Wensday"
  ] ,
    "Study"=>[
        1=>"March",
        2=>"April",
        3=>"May"
    ]
];

echo $a["Study"][3]."<br>";

//

//print_r($Salary);

//echo $Salary;

var_dump($f_Salary);

//объединение массивов в один

$c=array_merge($Salary,$f_Salary,$Job);

var_dump($c);

?>


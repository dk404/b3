<?php

// Способ создания массивов №1
    $sallary=[
        "Andrey"=>5500,
        "Lena"=>7000,
        "Yarik"=>5000,
        "Sergei"=>30000,
    ];

    echo $sallary["Andrey"]."<br>";

//Способ №2


    $f_sallary=array(
      "Andrey"=>10000,
        "Lena"=>50000,
        "Yarik"=>30000,
        "Sergei"=>100000,
    );

        echo $f_sallary["Andrey"]."<br>";
// Комбинированный массив
    $job=[
        100,
        "marrow",
        "Andrey"=>100500,

    ];
    echo $job[""];

    $marrow= [
        "sallary"=>[
            1=>"Monday",
            2=>"Thuesday",
            3=>"Wensday",

        ],
        "months"=>[
            1=>"Январь",
            2=>"Февраль",
            3=>"Март",

        ],


    ];

  // echo $sallary;

 // print_r ($sallary);
// var_dump($sallary);

 $c=array_merge($sallary, $f_sallary, $job);

var_dump($c);

?>



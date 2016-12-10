<?php

/*for($i=0;$i<=10;$i++){
    if($i==6){
     break;
    }

    echo $i."<br>";
}*/

/*$i=0;
while($i<=10){
    if($i==5){
        $i++;
        continue;
    }

    echo $i."<br>";
    $i++;

}*/

/*$i=20;

do{echo $i."<br>";
    $i++;
}
while($i<=10);*/

/*$days=[
    "monday"=>"понедельник",
    "thuesday"=>"вторник",
    "wednesday"=>"среда",
    "thursday"=>"Четверг",
    "friday"=>"пятница",
    "saturday"=>"Суббота",
    "Sunday"=>"Воскресенье",
];

foreach($days AS $key=>$val){
    if($key=="friday"){
    }

    echo "На английском: ".$key." на русском ".$val."<br>";

}*/

$a=3;

switch($a){
    case 1: echo "переменная a равна 1"; break;
    case 2: echo "переменная а равна 2"; break;
    case 3: echo "равно 3";
    case 5: echo "равно 5"; break;
    default: echo "нет совпадений";
}



?>


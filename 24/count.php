<?php

$a=[1,2,3,4,5];

//for ($i = 2; $i < 10; $i++){
//    echo "<p>номер итер:".$i."</p>";
//}

$i = 0;
$step = 10;

while($i <= 50){

    if($i==20){
//      break;

        $i = $i + $step;
        continue;

    }

    echo "<p>значение итер:".$i."</p>";

    $i = $i + $step;
}


$week=[
    "Monday"    => "Понедельник",
    "Tuesday"   => "Вторник",
    "Wednesday" => "Среда",
    "Therday"   => "Четверг",
    "Friday"    => "Пятница",
    "Saturday"  => "Суббота",
    "Sunday"    => "Воскресение"

];

//foreach($week as $val){
//    echo "<p>".$val."</p>";

//}

foreach($week as $key=>$val){

    if($key=="Wednesday"){
        echo "<p>на англ ".$key." <br> <b>на рус ".$val."</b></p>";
        continue;
    }

   echo "<p>на англ ".$key." <br> на рус ".$val."</p>";
   }

?>


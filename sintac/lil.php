<?php




/*
//цикл for

$a=[1,2,3,4,10];
for($i = 0; $i <= 145; $i++){
    echo "<p> просто текст".$i."</p>";
}

*/

//while

$i = 0;
$step = 7;
while($i < 100){

    if($i == 49){      // останавливает цыкл когда нужно
//        break;
        $i = $i + $step;

          continue;

    }

    echo "<p> просто текст".$i."</p>";

    $i = $i + $step;
}

//foreach

$week = [
    "sunday"    =>"воскресенье",
    "monday"    =>"понедельник",
    "thusday"   =>"вторник",
    "wednesday" =>"среда",
    "thesday"   =>"четверг",
    "friday"    =>"пятница",
    "saturday"  =>"cуббота"
];


//for
//
//each($week as $item){                      // вытягивает значение
//    echo "<p>".$item."</p>";
//}


//foreach($week as $key=>$value){
//    echo "<p>eng:".$key.", rus:".$value."</p>"; // вытягивает ключи
//}

foreach($week as $key=>$value){
    if($key == "wednesday"){
        echo "<p>:".$key.", rus:<b>".$value."</b></p>";
        continue;
    }


    echo "<p>:".$key.", rus:".$value."</p>";


}

?>


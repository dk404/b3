<?
//include("settings.php");
require_once("settings.php");
require_once("settings.php");

//одностр коммент
/*блочный коммент*/
/**
 * ывывы
 * ывыв
 * ывыв
 * коммент документации
 */

$vasyaGood = 1; //int
$dfdfd = 1.2; //int
$dfdfd = "Вася"; //int
$dfdfd = ' получил зп"'; //int

$g = "vasya";
$$g = "25";

define("VASYA", 2);

    echo "<hr>";
    echo __FILE__."/index.php";
    echo "<hr>";


$a = 1;
//$a = $a + 1;
//$a += 1;
//$a++;
++$a;

$b = 2;

$c = $a + $b;



//массивы основа!!!
$arr = array("one" => "один", 2 => "два", 3 => array(1 => "один один", 2 => array()));
$arr2 = [
             1 => "один"
            ,5 => "два"
            ,3 => "три"
        ];

$arr3 = [0 => "один", "два"];



//echo $arr['one'];

//Циклы for, while, do=while, each, map, foreach


for($i = 0; $i <= 10; $i++){
//    echo $i." <br>";
    echo $i." <br>";

}

$i = 1;
while($i < 10)
{
    echo $i." <br>";
    $i++;
}

$i = 25;
do{
    echo $i." <br>";
}
while($i < 10);


//перебор массивов
/*for($i = 1; $i <= count($arr2); $i++){
//    echo $i." <br>";
    echo $arr2[$i]." <br>";

}*/


foreach($arr2 as $key => $value){
    echo $key." - ". $value."<br>";
}

//функции
echo "<hr>";

echo fff("Вася"); //declaration function


/**
 * Моя функция
 * @param $a - <b>ававава ва </b> ывывыв ыв ыв
 * @param int $b
 * @return string
 */
function fff($a, $b = 2){
    return "hello" . $a;
}


//Дата
$today = time() ; //timestamp
$yest = strtotime("-1 day"); //timestamp

echo "<hr>";
echo date("d m Y", $yest);










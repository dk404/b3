<?php

require_once("test.php");




$mytestObj = new test();      //экземпляр класса


/*echo $mytestObj->d;

echo test::$c; // для static


*/

$mytestObj->b=1;
echo $mytestObj->b;



?>

 

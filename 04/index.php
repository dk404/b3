<?php
require_once("test.php");

   $test = new test();
   $test2 = clone $test;

   print_r($test->get_users());



?>


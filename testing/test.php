<?php
require_once "../07/library/Encrypt.php";

$ENCrypt = new Encrypt();


$pass = "Семен семёныч 1";

$crypt = $ENCrypt->enCrypt($pass);

$getPassFromCrypt = $ENCrypt->deCrypt($crypt);

$hash = md5($pass);
//$hash = sha1($pass);




$hash = password_hash($pass, PASSWORD_DEFAULT);
$res  = password_verify($pass, '$2y$10$Cr5s8RscJT1kMvaUkz6O7.r4nISBu.BWT6pXmD3PNoAg3XKCi399.');
$dfdf = 1;

?>


<?php

function users($n){

    $res = substr($n,-1);

    if($res == 1){
        $ret = "ь";
    }

    if($res > 4 or $res == 0){
        $ret = "ей";
    }

    if($res < 5 and $res > 1){
        $ret = "я";
    }

    return $ret;
}


$nn = rand();
echo   users(). " -  ".$nn;

?>

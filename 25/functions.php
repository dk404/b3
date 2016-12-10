<?php

/*function cube($n){
    $res=$n*$n*$n;

    return $res;
}

echo cube(100);*/

function expanent ($n, $e){
    $begin=$n;
    for($i=1; $i<$e; $i++){
        $n=$n*$begin;
    }
    return $n;
}

 echo expanent(100,5);
?>


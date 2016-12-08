<?php



function les($tr){

    //шаг 1 - находим последнюю цифру
    $res = substr($tr, -1);

    //шаг 2 -

    if($res==1){
        $jj = "ь";
    }

    if($res > 4 or $res == 0){
        $jj = "ей";
    }

    if($res > 1 and $res < 5){
        $jj = "я";
    }

    return $jj;

}

$nn = rand();
echo les($nn). " - ". $nn;


?>


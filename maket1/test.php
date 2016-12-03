<?php
require_once "autoload.php";
$m = new mail\Mail('utf-8');



/**
 * Created by PhpStorm.
 * User: admin
 * Date: 29.11.16
 * Time: 7:08 PM
 */

try{
    
    $m->To("dfdfdf@gfgffg.com");
    $m->Subject("dfdfdf");
    $m->log_on(true);
    $m->Send();
    
    if($m->status_mail){
        
    }
    
    
//    $res = mail("fgfgf@fddfd.com", "suuubject", "bla bla");

}
catch (Exception $e){
    $fdf = 1;
}

$gfg = 12121;
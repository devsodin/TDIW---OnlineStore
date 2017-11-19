<?php

require_once (__ROOT__.'/models/connect_db.php');
require (__ROOT__.'/models/register.php');
$register = register();
if($register == -1){
    require_once(__ROOT__ . '/views/default/register.php');
}else{
    if($register){
        echo 'no rula';
    }else{
        echo 'rula';
    }
}


;

?>
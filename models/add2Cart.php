<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 28/12/2017
 * Time: 13:14
 */

session_start();
if(!isset($_SESSION['products'])){
    $products = array($_POST['prID'] => intval($_POST['q']));
    $_SESSION['products'] = $products;
}else{
    if(array_key_exists($_POST['prID'],$_SESSION['products'])){
        $sum = intval($_SESSION['products'][$_POST['prID']]) + intval($_POST['q']);
        $_SESSION['products'][$_POST['prID']] = $sum;
    }else{
        $_SESSION['products'][$_POST['prID']] = intval($_POST['q']);
    }
}
print_r($_SESSION);
?>
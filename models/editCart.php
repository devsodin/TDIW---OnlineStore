<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 28/12/2017
 * Time: 13:14
 */

session_start();
switch ($_GET['mode']){
    case 'add':
        if(!isset($_SESSION['products'])){
            $products = array($_GET['prID'] => intval($_GET['q']));
            $_SESSION['products'] = $products;
        }else{
            if(array_key_exists($_GET['prID'],$_SESSION['products'])){
                $sum = intval($_SESSION['products'][$_GET['prID']]) + intval($_GET['q']);
                $_SESSION['products'][$_GET['prID']] = $sum;
            }else{
                $_SESSION['products'][$_GET['prID']] = intval($_GET['q']);
            }

        }
        break;
    case 'remove':
        if(array_key_exists($_GET['prID'],$_SESSION['products'])){
            unset($_SESSION['products'][$_GET['prID']]);
        }
        break;
    case 'empty':
        unset($_SESSION['products']);
        break;

}

?>
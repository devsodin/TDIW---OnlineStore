<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 27/12/2017
 * Time: 15:33
 */

session_start();

echo'<!DOCTYPE html>
<head>
    <title>ENP</title>
    <meta lang="en" charset="UTF-8">
    <link rel=stylesheet href="./views/css/style.css"/>
    <script src="./views/js/scripts.js" type="text/javascript" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body onload="sessionStatus()">';

if(session_status() == PHP_SESSION_ACTIVE){
    $name = $_SESSION['Name'];
    if($_SESSION['Admin']){
        require_once(__ROOT__ . '/views/default/management.php');
    } else{
        require_once (__ROOT__.'/views/default/userBar.php');
    }
}else{
    require_once (__ROOT__.'/views/default/userBar.php');
}



?>
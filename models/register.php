<?php

function register($connection)
{
    $name =  $_POST['name'];
    $surname = $_POST['surname'];
    $address = $_POST['address'];
    $city =  $_POST['city'];
    $cp =  $_POST['cp'];
    $password =  $_POST['passwd'];
    $password = password_hash($password,PASSWORD_DEFAULT );
    $mail = $_POST['mail'];


    $register = $connection->prepare("INSERT INTO User (Name, Surname, Mail, Password, Address, City, Postal_Code) VALUES (?,?,?,?,?,?,?)");
    $register->execute(array($name,$surname,$mail,$password,$address,$city,$cp));
    //echo "<pre>";print_r($connection);die;


}
?>

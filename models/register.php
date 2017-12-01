<?php

function register($connection)
{
    $name =  $_POST['name'];
    echo $name;
    $surname = $_POST['surname'];
    echo $surname;
    $address = $_POST['address'];
    echo $address;
    $city =  $_POST['city'];
    echo $city;
    $cp =  $_POST['cp'];
    echo $cp;
    $password =  $_POST['passwd'];
    $password = password_hash($password,PASSWORD_BCRYPT );
    echo $password;
    $mail = $_POST['mail'];
    echo $mail;


    $register = $connection->prepare("INSERT INTO User (Name, Surname, Mail, Password, Address, City, Postal_Code) VALUES (?,?,?,?,?,?,?)");
    echo 'connection';
    $register->execute(array($name,$surname,$mail,$password,$address,$city,$cp));
    echo 'asfs';
    //echo "<pre>";print_r($connection);die;


}
?>

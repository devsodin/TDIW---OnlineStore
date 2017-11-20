<?php

function register($mysql)
{

    $name = mysqli_real_escape_string($mysql, $_POST['name']);
    $surname = mysqli_real_escape_string($mysql, $_POST['surname']);
    $address = mysqli_real_escape_string($mysql, $_POST['address']);
    $city = mysqli_real_escape_string($mysql, $_POST['city']);
    $cp = mysqli_real_escape_string($mysql, $_POST['cp']);
    $password = mysqli_real_escape_string($mysql, $_POST['passwd']);
    $password = password_hash($password,PASSWORD_BCRYPT );
    $mail = mysqli_real_escape_string($mysql, $_POST['mail']);

    $insert = mysqli_prepare($mysql,"INSERT into user (Name,Surname,Address,City,Postal_Code,Password,Mail) VALUES (?,?,?,?,?,?,?)");

    $insert->bind_param('ssssiss',$name,$surname,$address,$city,$cp,$password,$mail);



    $insert->execute();




}
?>
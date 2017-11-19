<?php

function register(){
    if(isset($_POST['submit'])){
        $mysql = connect_db();
        $error = 0;

        $name = mysqli_real_escape_string($mysql,$_POST['name']);
        $surname = mysqli_real_escape_string($mysql,$_POST['surname']);

        $address = mysqli_real_escape_string($mysql,$_POST['address']);
        $city = mysqli_real_escape_string($mysql,$_POST['city']);
        $cp = mysqli_real_escape_string($mysql,$_POST['cp']);

        if($_POST['passwd'] != $_POST['passwd2']){
            $error = 1;
        }else{
            $password = mysqli_real_escape_string($mysql,$_POST['passwd']);
        }

        if($_POST['mail'] != $_POST['mail2']){
            $error = 1;
        }else{
            $mail = mysqli_real_escape_string($mysql,$_POST['mail']);
        }

        if(!$error) {
            $stmt = $mysql->prepare('INSERT INTO user (name, surname, mail, password, address, city, postal_code) VALUES (?,?,?,?,?,?,?)');
            $stmt->bind_param($name, $surname, $mail, $password, $address, $city, $cp);
            $stmt->execute();

        }
        $stmt->close();
        $mysql->close();
        return $error;
    }
    return -1;
}

?>
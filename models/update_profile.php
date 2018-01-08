<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 03/01/2018
 * Time: 16:03
 */

require_once (__DIR__.'/connect_db.php');
$connection = connect_db();


$sql = $connection->prepare("SELECT Password FROM User WHERE Id = ?");
$sql->execute(array($_POST['Id']));

$passwd = $sql->fetchColumn(0);


if(password_verify($_POST['Old_password'],$passwd)){
    $sql = $connection->prepare("UPDATE User SET Name=?,Surname=?,Mail=?,password=?,Address=?,City=?,Postal_code=? WHERE Id=?");
    $sql->execute(array($_POST['Name'],$_POST['Surname'],$_POST['Mail'],password_hash($_POST['New_password'],PASSWORD_DEFAULT),$_POST['Address'],$_POST['City'],$_POST['Cp'],$_POST['Id']));

    echo '1';
}else{
    echo '0';
}



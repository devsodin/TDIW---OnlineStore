<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 02/01/2018
 * Time: 16:57
 */

function getUserData($connection,$id){

    $isAdmin = checkAdmin($connection,$id);

    $sql = $connection->prepare("SELECT * FROM User WHERE Id = ?");
    $sql->execute(array($id));

    $queryData = $sql->fetch(PDO::FETCH_ASSOC);



    $userData['Id'] = $queryData['Id'];
    $userData['Name'] = $queryData['Name'];
    $userData['Surname'] = $queryData['Surname'];
    $userData['Mail'] = $queryData['Mail'];
    $userData['Password'] = $queryData['Password'];
    $userData['Address'] = $queryData['Address'];
    $userData['City'] = $queryData['City'];
    $userData['Postal_Code'] = $queryData['Postal_Code'];
    if($isAdmin){
        $userData['Active'] = $queryData['Active'];
        $userData['Admin'] = $queryData['Admin'];
    }

    return $userData;
}

function checkAdmin($connection ,$id){
    $sql = $connection->prepare("SELECT Admin FROM User WHERE Id = ?");
    $sql->execute(array($id));

    $admin = intval($sql->fetchColumn(0));



    if($admin == 1){
        return True;
    }else{
        return False;
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 24/12/2017
 * Time: 17:53
 */

function login($connection){
    if(isset($_POST['uname']) and isset($_POST['passwd'])){
        $mail = $_POST['uname'];
        $passwd = $_POST['passwd'];
        echo 'a';
        $sql = $connection->prepare("SELECT 'Mail', 'Password' FROM 'User' WHERE 'Mail'='".$mail."'");
        echo 'b';
        echo $sql->debugDumpParams();
        echo 'c';

        $sql->execute();
        echo 'd';
        $login = $sql->fetchALl(PDO::FETCH_ASSOC);
        if(password_hash($passwd) == $login['passwd']){
            echo 'blablabla';
        }

    }

}

?>
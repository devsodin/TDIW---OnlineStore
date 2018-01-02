<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 24/12/2017
 * Time: 17:53
 */

function login($connection){

    if(isset($_SESSION['id'])){
        if($_SESSION['Admin'] == True){
            header('Location:index.php?action=management');
        }else{
            header('Location:index.php');
        }
    }


    $mail = $_POST['uname'];
    $passwd = $_POST['passwd'];

    $sql = $connection->prepare("SELECT `Name`,`Surname` ,`Id`,`Mail`,`Password`,`Admin`,`Active` FROM User WHERE `Mail` = ?");
    $sql->execute(array($mail));
    $login = $sql->fetch(PDO::FETCH_ASSOC);
    if(password_verify($passwd,$login['Password'])){
        session_start();
        $_SESSION['Name'] = $login['Name'];
        $_SESSION['Mail'] = $login['Mail'];
        if($login['Admin'] == 1){

            $_SESSION['id'] = $login['Id'];
            $_SESSION['Admin'] = 1;
            header('Location:index.php?action=management');
        }else {
            if ($login['Active']) {
                $_SESSION['id'] = $login['Id'];
                $_SESSION['Admin'] = 0;
                header('Location:index.php');

            } else {
                echo '<h3 class="Error Message">User not Activated. Please, contact the Admin</h3>';
            }
        }
    }else{
        echo '<h3 class="Error Message">User or Password incorrect. Please try again.</h3>';
    }
}

function logout(){

    session_unset();
    session_destroy();
    header('Location:index.php');

}

?>
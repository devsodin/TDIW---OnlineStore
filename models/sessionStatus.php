<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 27/12/2017
 * Time: 16:26
 */

session_start();
if(isset($_SESSION['id'])){
    echo 1;
}else {
    echo 0;
}
?>
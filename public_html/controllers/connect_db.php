<?php
$mysql = new mysqli("localhost", "tdiw-d8", "zuupoxai", "tdiw-d8");
if (mysqli_connect_errno()){
    printf("Error connecting Database. Error: %s\n", $mysql->connect_error);
    exit();
}

?>
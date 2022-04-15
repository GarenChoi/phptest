<?php
    $host = "localhost";
    $user = "jundan2010";
    $pass = "cgy1669!";
    $db = "jundan2010";
    $connect = new mysqli($host, $user, $pass, $db);
    $connect -> set_charset("utf8");

    if(mysqli_connect_errno()){
        echo "DATABASE Connect False";
    } else {
        //echo "DATABASE Connect True";
    }

?>
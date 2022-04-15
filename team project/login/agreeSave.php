<?php
    include "../../connect/connect.php";
    $agree1 = $_POST['agree1'];
    $agree2 = $_POST['agree2'];

    // $result = fetch_array($agree2);
    var_dump($agree2);
    if($agree1 == true && $agree2 == true){
        Header("Location: join.php");
    } else {
        // echo "<script>alert('dd');</script>";
    }
?>
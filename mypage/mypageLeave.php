<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $memberID = $_SESSION['memberID'];

    $sql = "DELETE FROM myBlog WHERE memberID = $memberID";
    $connect -> query($sql);

    echo "<script>alert('탈퇴되었습니다.'); location.href = '../pages/main.php';</script>";
?>
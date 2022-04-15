<?php
    include "../../connect/session.php";
    unset($_SESSION['memberID']);
    unset($_SESSION['youName']);
    unset($_SESSION['youEmail']);
    echo "<script>history.back(1);</script>";
    // Header("Location: ../login/login.php");
?>
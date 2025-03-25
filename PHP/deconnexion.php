<?php
    session_start();
    $_SESSION = [];
    header("location: ../Pages/index.php");
?>
<?php
    session_start();
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    $_SESSION['logged'] = false;
    session_destroy();
    header("location:index.php");
?>
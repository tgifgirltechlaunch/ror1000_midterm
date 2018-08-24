<?php
    // delete the session 
    session_start();
    unset($_SESSION['pass']);
    unset($_SESSION['email']);
    unset($_SESSION['img']);
    session_destroy();

    // redirect to login
    header('Location: ../login.php');
?>
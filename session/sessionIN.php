<?php
    session_start();
    if(!isset($_SESSION['email'])){
        header('Location: mainpage.php');
        exit;
    } else {
        header('Location: login.php');
    }
?>
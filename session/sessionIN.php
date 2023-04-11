<!-- session in -->

<?php
session_start();
if (!isset($_SESSION['user_data']))
    header('location:login.php');
?>
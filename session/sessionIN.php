<!-- session in -->

<?php
session_start();
if (!isset($_SESSION['user_data']))
    header('location:partials/404.php');
?>
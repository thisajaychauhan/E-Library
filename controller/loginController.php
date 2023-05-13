<?php
session_start();
include '../config/connection.php';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format')</script>";
?>
        <meta http-equiv="refresh" content="0; url = http://localhost:8888/view/login.view.php" />
        <?php
        exit;
    }

    include '../modal/login.php';
}
?>
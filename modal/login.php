<?php

$check_email = "SELECT * FROM registration WHERE email = '$email' and password = '$password'";
$result = mysqli_query($con, $check_email);

$check = mysqli_num_rows($result);
if ($check) {
    $record = mysqli_fetch_assoc($result);
    $user_data = array($record['role'], $record['email'], $record['password'], $record['username']);
    $_SESSION["user_data"] = $user_data;
    $username = $record['username'];
    $role = $record['role'];
    if ($role == 'user') {
        echo "<script>alert('Login Successful as an user')</script>";
?>
        <meta http-equiv="refresh" content="0; url = http://localhost:8888/view/main_page.view.php" />
    <?php
    } elseif ($role == 'admin') {
        echo "<script>alert('Login Successful as an admin')</script>";
    ?>
        <meta http-equiv="refresh" content="0; url = http://localhost:8888/view/main_page.view.php" />
    <?php
    } elseif ($role == 'superadmin') {
        echo "<script>alert('Login Successful as super-admin')</script>";
    ?>
        <meta http-equiv="refresh" content="0; url = http://localhost:8888/view/main_page.view.php" />
    <?php
    } else {
        echo "<script>alert('Login Failed')</script>";
    ?>
        <meta http-equiv="refresh" content="0; url = http://localhost:8888/view/login.view.php" />
    <?php
    }
} else {
    echo "<script>alert('Wrong email or password')</script>";
    ?>
    <meta http-equiv="refresh" content="0; url = http://localhost:8888/view/login.view.php" />
<?php
}

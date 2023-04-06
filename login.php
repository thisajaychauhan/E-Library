<?php

include 'connection.php';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $check_email = "SELECT * FROM registration WHERE email = '$email' and password = '$password'";
    $result = mysqli_query($con, $check_email);

    $check = mysqli_fetch_array($result);
    if ($check) {
        echo "<script>alert('Login Successfull')</script>";
        echo '<script type="text/javascript">showPopup("' . $message . '");</script>';
?>
        ?>
            <meta http-equiv="refresh" content="0; url = http://localhost:8888/main-page.php" />
        <?php
    } else {
        echo "<script>alert('Login Failed')</script>";
        ?>
            <meta http-equiv="refresh" content="0; url = http://localhost:8888/login.php" />
        <?php
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>E-Library</title>
</head>

<body>


    <!-- navbar -->

    <nav>
        <p><a href="index.php">E-library</a></p>
    </nav>

    <!-- tagline -->

    <section>
        <p>Read and grow</p>
    </section>

    <div class="logincontainer-add">

        <form action="" method="post">
            <div class="flexadd">
                <!-- <div class="loginbanner"> -->
                <p class="bannerpara">Login here</p>
            </div>
            <div class="inner">
                <label for="">Email</label>
                <input type="text" name="email">
                <label for="">Password</label>
                <input type="password" name="password">

                <input class="loginlbtn" type="submit" value="Login" name="submit">
                <p>not register yet ?<a href="register.php"> Register here</a></p>
            </div>
    </div>
    </form>
    </div>

    </div>

    <?php include 'footer.php' ?>
</body>

</html>
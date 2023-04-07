<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $check_email = "SELECT email FROM registration WHERE email = '$email'";
    $result = mysqli_query($con, $check_email);

    if (mysqli_num_rows($result) > 0) {
        echo "email is already exists";
        header("location:register.php");
    } else {
        $query = "INSERT INTO registration (username,email, password)VALUES ('$username','$email','$password')";
        $query_result = mysqli_query($con, $query);

        if ($query_result) {
            echo '<script>alert("successfully register")</script>';
            header("location:login.php");
        } else {
            header("location:register.php");
        }
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

    <div class="container-add">

        <form action="" method="post">
            <div class="flexadd">
                <!-- <div class="loginbanner"> -->
                <p class="bannerpara">Register here</p>
            </div>
            <div class="inner">
                <label for="">Username</label>
                <input class="registerinput" type="text" name="username">
                <label for="">Email</label>
                <input class="registerinput" type="text" name="email">
                <label for="">Password</label>
                <input class="registerinput" type="password" name="password">

                <input class="registerRbtn" type="submit" name="submit" value="Register">
                <p><a href="login.php">if registered. Login here</a></p>
            </div>
        </form>
    </div>

    <?php include 'footer.php' ?>
</body>

</html>
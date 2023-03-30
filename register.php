<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $check_email = "SELECT email FROM registration WHERE email = '$email'";
    $result = mysqli_query($con, $check_email);

    if (mysqli_num_rows($result) > 0) {
        echo "email is already exists";
        header("location:register.php");
    } else {
        $query = "INSERT INTO registration (email, password)VALUES ('$email','$password')";
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
    <link rel="stylesheet" href="register.css" type="text/css">
    <title>E-Library</title>
</head>

<body>


    <!-- navbar -->

    <nav>
        <p><a href="index.php">E-library</a></p>
        <button class="btn"> <a href="login.php">Login</a></button>
    </nav>



    <!-- tagline -->

    <section>
        <p>Read and grow</p>
    </section>

    <div class="container-add">

        <form action="" method="post">
            <div class="flexadd">
                <div class="loginbanner">
                    <p class="bannerpara">Register here</p>
                </div>
                <div class="inner">
                    <label for="">Email</label>
                    <input type="text" name="email">
                    <label for="">Password</label>
                    <input type="password" name="password">

                    <button class="registerbtn" type="submit" name="submit">Register</button>
                </div>
            </div>
        </form>
    </div>

    </div>

    <!-- footer -->

    <footer>
        <p>&copy; E-Library 2023</p>
    </footer>
    </div>
    </section>

    <script src="myscripts.js"></script>
</body>

</html>
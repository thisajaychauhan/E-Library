<?php

include 'connection.php';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $check_email = "SELECT * FROM registration WHERE email = '$email' and password = '$password'";
    $result = mysqli_query($con, $check_email);

    $check = mysqli_fetch_array($result);
    if (isset($check)) {
        //    ?> <script Type="javascript">alert("login success")</script><?php
        echo "<script type=\"text/javascript\">alert('This works');</script>"; 
        header("location:mainpage.php");
    } else {
        ?> <script Type="javascript">alert("login fail")</script><?php
        header("location:login.php");
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css" type="text/css">
    <title>E-Library</title>
</head>

<body>


    <!-- navbar -->

    <nav>
        <p><a href="index.php">E-library</a></p>
        <button class="btn"> <a href="register.php">Register</a></button>
    </nav>



    <!-- tagline -->

    <section>
        <p>Read and grow</p>
    </section>

    <div class="container-add">

        <form action="" method="post">
            <div class="flexadd">
                <div class="loginbanner">
                    <p class="bannerpara">Login here</p>
                </div>
                <div class="inner">
                    <label for="">Email</label>
                    <input type="text" name="email">
                    <label for="">Password</label>
                    <input type="password" name="password">

                    <button class="loginbtn" type="submit" name="submit">login</button>
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
</body>

</html>
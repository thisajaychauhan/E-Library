<?php
session_start();
include 'connection.php';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format')</script>";
?>
        <meta http-equiv="refresh" content="0; url = http://localhost:8888/login.php" />
        <?php
        exit;
    }

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
            <meta http-equiv="refresh" content="0; url = http://localhost:8888/main-page.php" />
        <?php
        } elseif ($role == 'admin') {
            echo "<script>alert('Login Successful as an admin')</script>";
        ?>
            <meta http-equiv="refresh" content="0; url = http://localhost:8888/main-page.php" />
        <?php
        } elseif ($role == 'superadmin') {
            echo "<script>alert('Login Successful as super-admin')</script>";
        ?>
            <meta http-equiv="refresh" content="0; url = http://localhost:8888/main-page.php" />
        <?php
        } else {
            echo "<script>danger('Login Failed')</script>";
        ?>
            <meta http-equiv="refresh" content="0; url = http://localhost:8888/login.php" />
        <?php
        }
    } else {
        echo "<script>danger('Wrong email or password')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url = http://localhost:8888/login.php" />
<?php
    }
}
?>



<!-- html header -->
<?php include 'partials/html-header.php'; ?>

<!-- navbar -->
<?php include 'partials/navbar.php'; ?>

<!-- /tagline -->
<?php include 'partials/tagline.php'; ?>


<div class="container d-flex justify-content-center">
    <div class="card rounded-0" style="width:500px">
        <div class="card-header rounded-0 bg-dark text-white">
            <h1 class="text-center text-capitalize">Login here</h1>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mt-2 fw-bold">
                    <label for="">Email</label>
                    <input class="form-control rounded-0" type="text" name="email" required>
                </div>
                <div class="mt-2 fw-bold">
                    <label for="">Password</label>
                    <input class="form-control rounded-0" type="password" name="password" required>
                </div>

                <button class="btn btn-primary form-control rounded-0 mt-3" type="submit" name="submit">login</button>

            </form>
        </div>
        <div class="border-top-none d-flex flex-column text-center">
            <a class="text-info text-decoration-none" href="forgotpassword.php">forgot password ?</a>
            <a href="register.php" class="text-dark text-decoration-none">not register yet ? <span class=" text-info"> register here</span></a>
        </div>
    </div>
</div>




<!-- footer -->
<footer class="bg-dark text-center fixed-bottom">
    <div class="container text-white p-1">
        <small>&copy; E-Library 2023. Made in <a href="https://coloredcow.com/"><img style="width:16px" class="mb-1" src="ColoredCow-logo-white.png" alt="logo"></a> ColoredCow Tehri. </small>
    </div>
</footer>


</body>

</html>
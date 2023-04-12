<?php
session_start();
include 'connection.php';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $check_email = "SELECT * FROM registration WHERE email = '$email' and password = '$password'";
    $result = mysqli_query($con, $check_email);

    $check = mysqli_num_rows($result);
    if ($check) {
        $record = mysqli_fetch_assoc($result);
        $user_data = array($record['role'], $record['email'], $record['password']);
        $_SESSION["user_data"] = $user_data;
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
        } else {
            echo "<script>alert('Login Failed')</script>";
        ?>
            <meta http-equiv="refresh" content="0; url = http://localhost:8888/login.php" />
<?php
        }
    }
}
?>


<!-- html header -->
<?php include 'partials/html-header.php'; ?>

<!-- navbar -->
<?php include 'partials/navbar.php'; ?>

<!-- /tagline -->
<?php include 'partials/tagline.php'; ?>


<div class="container-add">

    <form action="" method="post">
        <div class="flexadd">
            <!-- <div class="loginbanner"> -->
            <p class="bannerpara">Login here</p>
        </div>
        <div class="inner">

            <label for="">Email</label>
            <input class="registerinput" type="text" name="email">
            <label for="">Password</label>
            <input class="registerinput" type="password" name="password">

            <input class="registerRbtn" type="submit" name="submit" value="login">
            <p><a href="register.php">if not register. <span class="fw-medium text-info"> register here</span></a></p>
        </div>
    </form>
</div>


<!-- footer -->
<?php include 'partials/footer.php' ?>

</body>

</html>
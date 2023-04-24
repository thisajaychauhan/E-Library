<!-- html header -->
<?php include 'partials/html-header.php'; ?>

<!-- navbar -->
<?php include 'partials/navbar.php'; ?>

<!-- /tagline -->
<?php include 'partials/tagline.php'; ?>


<?php
include 'connection.php';
session_start();

if (isset($_POST['verify'])) {
    $email = $_POST['email'];
    $verify_code = $_POST['verify_code'];

    $match_query = "SELECT token , exp_time FROM registration WHERE email = '$email' ";
    $match_result = mysqli_query($con, $match_query);

    if (mysqli_num_rows($match_result) == 1) {
        $row = mysqli_fetch_array($match_result);
        $token = $row['token'];
        $exp_time = $row['exp_time'];

        if ($token == $verify_code && strtotime($exp_time) > time()) {
            $verify_query = "UPDATE registration SET verify_status = 'Verified' , token = 'NULL' , exp_time = 'NULL'  WHERE email = '$email' ";
            $result = mysqli_query($con, $verify_query);
            if ($result) {
                echo "<script>alert('Registration successful')</script>";
?>
                <meta http-equiv="refresh" content="0; url = http://localhost:8888/login.php" />
            <?php
            }
        } else {
            echo "<script>alert('Invalid or expired token')</script>";
        }
    }
}
?>

<!-- main -->
<div class="container d-flex justify-content-center">
    <div class="card" style="width:500px">
        <div class="card-header bg-dark text-white">
            <h1 class="text-capitalize text-center">registration email verification</h1>
        </div>
        <small>Please verify your email address by using one time password which we will send you to your registered email.</small>
        <div class="class-body">
            <form action="" method="post">
                <input class="form-control mt-2" type="text" name="email" placeholder="Enter your email" required>
                <input class="form-control mt-2" type="text" name="verify_code" placeholder="Enter verification code" required>
                <button class="btn btn-primary mt-4" name="verify">verify email</button>
        </div>
    </div>
</div>
</form>



<!-- footer -->
<footer class="bg-dark text-center fixed-bottom">
    <div class="container text-white p-1">
    <small>&copy; E-Library 2023. Made in  <a href="https://coloredcow.com/"><img style="width:16px" class="mb-1" src="ColoredCow-logo-white.png" alt="logo"></a> ColoredCow Tehri. </small>
    </div>
</footer>

</body>

</html>
<!-- html header -->
<?php include 'partials/html-header.php'; ?>

<!-- navbar -->
<?php include 'partials/navbar.php'; ?>

<!-- /tagline -->
<?php include 'partials/tagline.php'; ?>



<?php
include 'connection.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['forgot'])) {
    $email = $_POST['email'];

    $search_query = "SELECT * FROM registration WHERE email = '$email'";
    $result = mysqli_query($con, $search_query);
    $row  = mysqli_fetch_assoc($result);
    if ($row) {
        $verification_code = bin2hex(random_bytes(8));
        date_default_timezone_set('Asia/kolkata');
        $expiry_date = date("Y-m-d H:i:s", strtotime('+60 minutes'));

        $verify_code_query = "UPDATE registration SET token = '$verification_code',exp_time = ' $expiry_date'  WHERE email = '$email' ";
        $result = mysqli_query($con, $verify_code_query);

        //Load Composer's autoloader
        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ajayc0343@gmail.com';
        $mail->Password = 'google password';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('ajayc0343@gmail.com', 'ColoredCow Tehri');
        $mail->addAddress($email, $user);

        $mail->isHTML(true);
        $mail->Subject = 'Forgot Password Verification';
        $mail->Body    = "Hi to reset your password please.. <br>Click the link bellow: <br>
        <a href='http://localhost:8888/updatepassword.php?email=$email&token=$verification_code'>reset password</a>";

        if ($mail->send()) {
            echo "<script>alert('Verification email sent. Please check your email within 1 hour.')</script>";
?>
            <meta http-equiv="refresh" content="0; url = http://localhost:8888/forgotpassword.php" />
<?php
        }
    }
}
?>

<!-- main -->
<div class="container d-flex justify-content-center">
    <div class="card" style="width:500px">
        <div class="card-header bg-dark text-white text-center">
            <h1 class="text-capitalize">forgot password</h1>
        </div>
        <div class="card-body">
            <small class="fw-lighter">Please verify your email address by using link which we will send you to your registered email.</ class="fw-lighter">
            <form action="" method="post">
                <input class="form-control mt-2" type="text" name="email" placeholder="Enter your email" required>
                <button class="btn btn-primary mt-3" name="forgot">verify email</button>
            </form>
        </div>
    </div>
</div>





<!-- footer -->
<footer class="bg-dark text-center fixed-bottom">
    <div class="container text-white p-1">
    <small>&copy; E-Library 2023. Made in  <a href="https://coloredcow.com/"><img style="width:16px" class="mb-1" src="ColoredCow-logo-white.png" alt="logo"></a> ColoredCow Tehri. </small>
    </div>
</footer>

</body>

</html>
<?php
include '../config/connection.php';
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
        require '../vendor/autoload.php';

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ajayc0343@gmail.com';
        $mail->Password = '';
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
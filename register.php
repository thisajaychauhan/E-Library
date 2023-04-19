<?php
include 'connection.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    // $token = md5(rand());

    $mail = new PHPMailer(true);

    $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;


    $mail->isSMTP();

    //Set the SMTP server to send through
    $mail->Host = 'smtp.gmail.com';

    //Enable SMTP authentication
    $mail->SMTPAuth = true;

    //my username
    $mail->Username = 'ajayc0343@gmail.com';

    //my google mail app password
    $mail->Password = 'itufvivjplhdasyu';

    //Enable TLS encryption;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    // $mail->SMTPSecure = 'ssl';

    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('ajayc0343@gmail.com', 'ColoredCow Tehri');

    //Add a recipient
    $mail->addAddress($email, $username);

    //Set email format to HTML
    $mail->isHTML(true);

    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    date_default_timezone_set('Asia/kolkata');
    $expiry_date = date("Y-m-d H:i:s", strtotime('+60 minutes'));

    $mail->Subject = 'Email verification';
    $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

    $mail->send();

    // sql query 
    $check_email = "SELECT email FROM registration WHERE email = '$email'";
    $result = mysqli_query($con, $check_email);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email is already exist')</script>";
?>
        <meta http-equiv="refresh" content="0; url = http://localhost:8888/register.php" />
        <?php
    } else {
        $verify_status = 'Not Verified';
        $query = "INSERT INTO registration (username,email, password,role,token,verify_status,exp_time)VALUES ('$username','$email','$password','$role','$verification_code','$verify_status','$expiry_date')";
        $query_result = mysqli_query($con, $query);

        if ($query_result) {

            session_start();
            $_SESSION["user_data"] = $user_data;
            $role = $record['role'];
            if ($role == 'admin') {
                echo "<script>alert('Verification email sent. Please check your email within 1 hour.')</script>";
        ?>
                <meta http-equiv="refresh" content="0; url = http://localhost:8888/verify-email.php" />
            <?php
            }

            if ($query_result) {
                echo "<script>alert('Verification email sent. Please check your email within 1 hour.')</script>";
            ?>
                <meta http-equiv="refresh" content="0; url = http://localhost:8888/verify-email.php" />
<?php
            }
        } else {
            header("location:register.php");
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

<div class="container d-flex justify-content-center ">
    <div class="card" style="width:500px">
        <div class="card-header bg-dark text-white">
            <h1 class="text-center text-capitalize">register here</h1>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <label for="">Username</label>
                <input class="form-control" type="text" name="username" required>

                <label for="">Email</label>
                <input class="form-control" type="text" name="email" required>

                <label for="">Password</label>
                <input class="form-control" type="password" name="password" required>

                <?php
                $role = 'user';

                session_start();
                if (isset($_SESSION['user_data'])) {
                    $data = $_SESSION['user_data'];
                    $role = $data['0'];

                    if ($role == 'user' && isset($_SESSION['promoted_to_admin']) && $_SESSION['promoted_to_admin'] == true) {
                        $role = 'admin';
                    }
                }
                ?>

                <label for="">User Role</label>
                <input class="form-control" type="text" value="<?php echo $role ?>" name="role" readonly>

                <!-- register button -->
                <button class="btn btn-primary form-control mt-3" type="submit" name="submit">Register</button>

                <div class="mt-3">
                    <a href="login.php" class="text-dark text-decoration-none">Already a member ? <span class="text-info"> Login here</span></a>
                </div>
        </div>
        </form>
    </div>
</div>
</div>


<!-- footer -->
<footer class="bg-dark text-center fixed-bottom">
    <div class="container text-white p-1">
        <small>&copy; E-Library 2023. Made with &#10084; in <a href="https://coloredcow.com/"><img style="width:16px" src="ColoredCow-logo-white.png" alt="logo"></a> ColoredCow Tehri. </small>
    </div>
</footer>

</body>

</html>
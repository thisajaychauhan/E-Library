<?php
include '../connection.php';
if (isset($_GET['token']) && isset($_GET['email'])) {
    $mail_token = mysqli_real_escape_string($con, $_GET['token']);
    $email = mysqli_real_escape_string($con, $_GET['email']);

    $match_query = "SELECT token , exp_time FROM registration WHERE email = '$email' ";
    $match_result = mysqli_query($con, $match_query);

    if (mysqli_num_rows($match_result) == 1) {
        $row = mysqli_fetch_array($match_result);
        $db_token = $row['token'];
        $exp_time = $row['exp_time'];

        if ($db_token == $mail_token && strtotime($exp_time) > time()) {

            if (isset($_POST['update'])) {
                $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
                // $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                $update_query = "UPDATE registration SET password = '$new_password', token = 'NULL' , exp_time = 'NULL' WHERE email = '$email'";
                $update_result = mysqli_query($con, $update_query);

                if ($update_result) {
                    echo "<script>alert('New password created successfully')</script>";
                    header("refresh:0; url=http://localhost:8888/login.php");
                    exit();
                } else {
                    echo "<script>alert('Error updating password')</script>";
                }
            }
        } else {
            echo "<script>alert('Invalid or expired token')</script>";
        }
    }
}
?>
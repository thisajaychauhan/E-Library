<?php
include '../connection.php';
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
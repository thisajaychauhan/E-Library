<?php
include 'connection.php';



if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];


    $check_email = "SELECT email FROM registration WHERE email = '$email'";
    $result = mysqli_query($con, $check_email);

    if (mysqli_num_rows($result) > 0) {
        echo "email is already exists";
        header("location:register.php");
    } else {
        $query = "INSERT INTO registration (username,email, password,role)VALUES ('$username','$email','$password','$role')";
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
            <p class="bannerpara">Register here</p>
        </div>
        <div class="inner">

            <label for="">Username</label>
            <input class="registerinput" type="text" name="username">

            <label for="">Email</label>
            <input class="registerinput" type="text" name="email">

            <label for="">Password</label>
            <input class="registerinput" type="password" name="password">

            <?php
            session_start();
            if (isset($_SESSION['user_data'])) {
                $data = $_SESSION['user_data'];
                $role = $data['0'];
                if ($role == 'admin') {
            ?>
                    <label for="">User Role</label>
                    <input class="registerinput" type="text" value="admin" name="role" readonly>
            <?php
                }
            } ?>
            <label for="">User Role</label>
            <input class="registerinput" type="text" value="user" name="role" readonly>

            <input class="registerRbtn" type="submit" name="submit" value="Register">
            <p><a href="login.php">if registered. <span class="fw-medium text-info"> Login here</span></a></p>
        </div>
    </form>
</div>


<!-- footer -->
<?php include 'partials/footer.php' ?>

</body>

</html>
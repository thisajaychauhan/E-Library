<!-- session IN -->
<?php include 'session/sessionIN.php'; ?>

<!-- html header -->
<?php include 'partials/html-header.php'; ?>

<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
        <a class="navbar-brand fw-medium fs-3 text-white" href="#">E-library <i class="fa fa-book-open-cover"></i></a>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">

            <!-- Back button -->
            <a href="alladmins.php" class="btn bg-light text-dark fw-bold" role="button" name="submit" type="submit"><i class="fa fa-chevron-left"></i> back</a>
    </div>
</nav>

<!-- /tagline -->
<?php include 'partials/tagline.php'; ?>


<?php
include 'connection.php';

if (isset($_GET['admin_id'])) {
    $admin_id = $_GET['admin_id'];

    $edit_query = "SELECT * FROM registration WHERE role = 'admin' AND id = '$admin_id' ";
    $result = mysqli_query($con, $edit_query);
    $single_row = mysqli_fetch_array($result);
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $edit_query = "SELECT * FROM registration WHERE id = '$admin_id' ";
    $result = mysqli_query($con, $edit_query);
    $single_row = mysqli_fetch_array($result);

    $save_admindetail = "UPDATE registration SET username = '$username',email ='$email', role = '$role', password = '$password' WHERE id = '$admin_id' ";
    $run_admindetail = mysqli_query($con, $save_admindetail);

    if ($run_admindetail) {
        echo "<script>alert('Admin Profile Updated Successfully')</script>";
?>
        <meta http-equiv="refresh" content="0; url = http://localhost:8888/alladmins.php" />
<?php
    }
}
?>

<!-- main -->
<div class="container d-flex justify-content-center ">
    <div class="card rounded-0" style="width:500px">
        <div class="card-header rounded-0 bg-dark text-white">
            <h1 class="text-center text-capitalize">edit admin details</h1>
        </div>
        <div class="card-body text-capitalize">
            <form action="" enctype="multipart/form-data" method="post">
                <div class="">
                    <label for="username" class="form-label fw-bold">username</label>
                    <input type="text" name="username" class="form-control rounded-0 text-capitalize" id="username" value="<?= $single_row['username']; ?>">
                </div>
                <div class="mt-3">
                    <label for="email" class="form-label fw-bold">email</label>
                    <input type="text" name="email" class="form-control rounded-0" id="email" value="<?= $single_row['email']; ?>">
                </div>
                <div class="mt-3">
                    <label for="role" class="form-label fw-bold">role</label>
                    <input type="text" class="form-control rounded-0" name="role" id="role" value="<?= $single_row['role']; ?>">
                </div>
                <div class="mt-3">
                    <label for="password" class="form-label fw-bold">password</label>
                    <input type="password" class="form-control rounded-0" name="password" id="password" value="<?= $single_row['password']; ?>">
                </div>

                <div class="mt-4">
                    <button type="submit" name="submit" class="btn btn-primary rounded-0 col-12">update</button>
                </div>
            </form>
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
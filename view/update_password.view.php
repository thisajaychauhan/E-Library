<!-- html header -->
<?php include '../partials/html-header.php'; ?>

<!-- navbar -->
<?php include '../partials/navbar.php'; ?>

<!-- /tagline -->
<?php include '../partials/tagline.php'; ?>

<!-- controlller -->
<?php include '../controller/update_password.php'; ?>


<!-- main -->
<div class="container d-flex justify-content-center">
    <div class="card rounded-0" style="width:500px">
        <div class="card-header rounded-0 bg-dark text-white">
            <h1 class="text-capitalize text-center">password reset</h1>
        </div>
        <div class="card-body">
            <small>Fill your password carefully.</small>
            <form action="" method="post">
                <input class="form-control rounded-0 mt-2" type="password" name="new_password" placeholder="Your New Password" required>
                <div class="float-end"><button class="btn btn-primary rounded-0 mt-4" type="submit" name="update">update password</button></div>
            </form>
        </div>
    </div>


    <!-- footer -->
    <footer class="bg-dark text-center fixed-bottom">
        <div class="container text-white p-1">
            <small>&copy; E-Library 2023. Made in <a href="https://coloredcow.com/"><img style="width:16px" class="mb-1" src="../ColoredCow-logo-white.png" alt="logo"></a> ColoredCow Tehri. </small>
        </div>
    </footer>

    </body>

    </html>
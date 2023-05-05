<!-- html header -->
<?php include '../partials/html-header.php'; ?>

<!-- navbar -->
<?php include '../partials/navbar.php'; ?>

<!-- /tagline -->
<?php include '../partials/tagline.php'; ?>

<!-- php mailer controller -->
<?php include '../controller/php_mailer_forgot.php'; ?>



<!-- main -->
<div class="container d-flex justify-content-center">
    <div class="card rounded-0" style="width:500px">
        <div class="card-header rounded-0 bg-dark text-white text-center">
            <h1 class="text-capitalize">forgot password</h1>
        </div>
        <div class="card-body">
            <small class="fw-lighter">Please verify your email address by using link which we will send you to your registered email.</ class="fw-lighter">
                <form action="" method="post">
                    <input class="form-control rounded-0 mt-2" type="text" name="email" placeholder="Enter your email" required>
                    <div class="float-end">
                        <button class="btn btn-primary rounded-0 mt-3" name="forgot">verify email</button>
                        <!-- Back button -->
                        <a href="login.view.php" class="btn bg-danger rounded-0 mt-3 text-light" role="button" name="submit" type="submit">back</a>
                    </div>
                </form>
        </div>
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
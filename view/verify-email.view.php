<!-- html header -->
<?php include '../partials/html-header.php'; ?>

<!-- navbar -->
<?php include '../partials/navbar.php'; ?>

<!-- /tagline -->
<?php include '../partials/tagline.php'; ?>

<!-- controller -->
<?php include '../controller/verify_emailController.php'; ?>


<!-- main -->
<div class="container d-flex justify-content-center">
    <div class="card rounded-0" style="width:500px">
        <div class="card-header rounded-0 bg-dark text-white">
            <h1 class="text-capitalize text-center">registration email verification</h1>
        </div>
        <small class="mt-2 text-center">Please verify your email address by using one time password which is sended to your registered email.</small>
        <div class="class-body mt-3">
            <form action="" method="post">
                <input class="form-control rounded-0 mt-2" type="text" name="email" placeholder="Enter your email" required>
                <input class="form-control rounded-0 mt-2" type="text" name="verify_code" placeholder="Enter verification code" required>
                <div class="float-end"> <button class="btn btn-primary rounded-0 mt-4" name="verify">verify email</button></div>

        </div>
    </div>
</div>
</form>



<!-- footer -->
<footer class="bg-dark text-center fixed-bottom">
    <div class="container text-white p-1">
        <small>&copy; E-Library 2023. Made in <a href="https://coloredcow.com/"><img style="width:16px" class="mb-1" src="../ColoredCow-logo-white.png" alt="logo"></a> ColoredCow Tehri. </small>
    </div>
</footer>

</body>

</html>
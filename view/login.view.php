
<!-- controller -->
<?php include '../controller/loginController.php'; ?>

<!-- html header -->
<?php include '../partials/html-header.php'; ?>

<!-- navbar -->
<?php include '../partials/navbar.php'; ?>

<!-- /tagline -->
<?php include '../partials/tagline.php'; ?>


<div class="container d-flex justify-content-center">
    <div class="card rounded-0" style="width:500px">
        <div class="card-header rounded-0 bg-dark text-white">
            <h1 class="text-center text-capitalize">Login here</h1>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mt-2 fw-bold">
                    <label for="">Email</label>
                    <input class="form-control rounded-0" type="text" name="email" required>
                </div>
                <div class="mt-2 fw-bold">
                    <label for="">Password</label>
                    <input class="form-control rounded-0" type="password" name="password" required>
                </div>

                <button class="btn btn-primary form-control rounded-0 mt-3" type="submit" name="submit">login</button>

            </form>
        </div>
        <div class="border-top-none d-flex flex-column text-center mb-3">
            <a class="text-info text-decoration-none" href="forgotpassword.view.php">forgot password ?</a>
            <a href="register.view.php" class="text-dark text-decoration-none">not register yet ? <span class=" text-info"> register here</span></a>
        </div>
    </div>
</div>




<!-- footer -->
<footer class="bg-dark text-center fixed-bottom">
    <div class="container text-white p-1">
        <small>&copy; E-Library 2023. Made in <a href="https://coloredcow.com/"><img style="width:16px" class="mb-1" src="../image/ColoredCow-logo-white.png" alt="logo"></a> ColoredCow Tehri. </small>
    </div>
</footer>


</body>

</html>
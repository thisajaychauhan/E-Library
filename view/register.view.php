<!-- controller -->
<?php include '../controller/registerController.php'; ?>

<!-- html header -->
<?php include '../partials/html-header.php'; ?>

<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
        <a class="navbar-brand fw-medium fs-3 text-white" href="#">E-library <i class="fa fa-book-open-cover"></i></a>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">

            <!-- Back button -->
            <a href="login.view.php" class="btn bg-light text-dark fw-bold" role="button" name="submit" type="submit"><i class="fa fa-chevron-left"></i> back</a>
    </div>
</nav>

<!-- /tagline -->
<?php include '../partials/tagline.php'; ?>

<div class="container d-flex justify-content-center ">
    <div class="card rounded-0" style="width:500px">
        <div class="card-header rounded-0 bg-dark text-white">
            <h1 class="text-center text-capitalize">register here</h1>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <label class="mt-2 fw-bold">Username</label>
                <input class="form-control rounded-0 text-capitalize" type="text" name="username" required>

                <label class="mt-2 fw-bold">Email</label>
                <input class="form-control rounded-0" type="text" name="email" required>

                <label class="mt-2 fw-bold">Password</label>
                <input class="form-control rounded-0" type="password" name="password" required>

                <?php
                $role = 'user';

                session_start();
                if (isset($_SESSION['user_data'])) {
                    $data = $_SESSION['user_data'];
                    $role = $data['0'];

                    if ($role == 'user' && isset($_SESSION['promoted_to_superadmin']) && $_SESSION['promoted_to_superadmin'] == true) {
                        $role = 'admin';
                    }
                    if ($role == 'superadmin') {
                        $role = 'admin';
                    }
                }
                ?>
                <label class="mt-2 fw-bold">User Role</label>
                <input class="form-control rounded-0" type="text" value="<?php echo $role ?>" name="role" readonly>

                <!-- register button -->
                <button class="btn btn-primary form-control rounded-0 mt-3" type="submit" name="submit">Register</button>

                <div class="mt-3 text-center">
                    <?php if ($role !== 'admin') {
                        echo ' <a href="login.view.php" class="text-dark text-decoration-none">Already a member ? <span class="text-info"> Login here</span></a>';
                    } ?>
                </div>
        </div>
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
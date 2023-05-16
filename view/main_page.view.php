<!-- session IN -->
<?php include '../session/sessionIN.php'; ?>

<!-- html header -->
<?php include '../partials/html-header.php'; ?>

<!-- sidebar -->
<?php include '../partials/sidebar.php'; ?>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-medium fs-4 text-white" href="#">E-library <i class="fa fa-book-open-cover"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <?php if (isset($_SESSION['user_data'])) {
                    $data = $_SESSION['user_data'];
                    $role = $data['0'];

                    if ($role == 'user') {
                ?>
                        <!-- history sidebar button -->
                        <li><button class="btn btn-outline-light mx-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button"><i class="fa fa-history"></i></button></li>
                <?php }
                }
                ?>
                <!-- book issue button -->
                <li><a href="../view/wishlist.view.php" class="btn btn-dark btn-outline-light ml-1"><i class="fa fa-shopping-cart"></i></a></li>

                <!-- sorting button -->
                <div class="ms-1 d-flex">
                    <form action="" method="get" class="d-flex">
                        <select name="sort_alphabet" class="form-control">
                            <option value="">sort as</option>
                            <option value="a-z" <?php if (isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "a-z") {
                                                    echo "selected";
                                                } ?>>A-Z</option>
                            <option value="z-a" <?php if (isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "z-a") {
                                                    echo "selected";
                                                } ?>>Z-A</option>
                        </select>
                        <!-- sort button -->
                        <button class="btn btn-primary" name="submit" type="submit"><i class="fa fa-sort"></i></button>
                    </form>
                </div>

                <!-- search button -->
                <form method="get" class="form-inline my-lg-0 d-flex mx-1">
                    <input class="form-control rounded-start" type="text" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary my-sm-0 rounded-end" type="submit"><i class="fa fa-search"></i></button>
                </form>

                <!-- book dropdown -->
                <?php
                if (isset($_SESSION['user_data'])) {
                    $data = $_SESSION['user_data'];
                    $role = $data['0'];
                    if ($role == 'admin' || $role == 'superadmin') { ?>
                        <li>
                            <div class="dropdown ml-1">
                                <button class="btn btn-dark btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">Book</button>
                                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end text-center text-capitalize">

                                    <!-- add book button -->
                                    <li> <a href="../view/add_book.view.php" class="dropdown-item">Add Book</a></li>

                                    <!-- all book button -->
                                    <li><a href="../view/all_books.view.php" class="dropdown-item">Book list</a></li>

                                </ul>
                            </div>
                        </li>
                <?php }
                } ?>

                <!-- user menu dropdown -->
                <li>
                    <div class="dropdown m-1">
                        <button class="btn btn-dark btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><i class="fa fa-user"></i></button>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end text-center">

                            <!--user profile button -->
                            <li><a href="../view/profile.view.php" class="dropdown-item">Profile</a></li>

                            <?php
                            if (isset($_SESSION['user_data'])) {
                                $data = $_SESSION['user_data'];
                                $role = $data['0'];

                                if ($role == 'admin' || $role == 'superadmin') { ?>
                                    <!-- all admins button -->
                                    <li><a href="../view/all_admin.view.php" class="dropdown-item">Admin Detail</a></li>

                                    <?php if (isset($_SESSION['user_data'])) {
                                        $data = $_SESSION['user_data'];
                                        $role = $data['0'];
                                        if ($role == 'superadmin') {
                                    ?>
                                            <!-- add new admin button -->
                                            <li><a href="../view/register.view.php" class="dropdown-item">Add new Admin</a></li>
                                    <?php }
                                    } ?>
                                    <!-- admin logout button -->
                                    <li><a href="../session/sessionOUT.php" class="dropdown-item text-danger"><i class="fa fa-sign-out text-danger"></i> Log Out</a></li>

                                <?php } else { ?>
                                    <!--user logout button -->
                                    <li><a href="../session/sessionOUT.php" class="dropdown-item text-danger"><i class="fa fa-sign-out text-danger"></i> Log Out</a></li>
                                    <!-- <li><a href="../partials/demo.php" class="m-1 btn btn-danger" role="button">verify</a></li> -->
                            <?php }
                            } ?>
                        </ul>
                    </div>
                </li>
        </div>
</nav>

<div class="text-center bg-light">
    <small class="fw-bold">Welcome -
        <?php $data = $_SESSION['user_data'];
        echo $role = $data['3'] . '&nbsp;';
        echo  '[' . $role = $data['0'] . ']'; ?>
    </small>
</div>

<!-- /tagline -->
<?php include '../partials/tagline.php'; ?>

<!-- crousel -->
<?php include '../partials/carousel.php'; ?>


<!-- controller -->
<?php include '../controller/main_pageController.php'; ?>

<!-- footer -->
<footer class="bg-dark text-center fixed">
    <div class="container text-white p-1">
        <small>&copy; E-Library 2023. Made in <a href="https://coloredcow.com/"><img style="width:16px" class="mb-1" src="../image/ColoredCow-logo-white.png" alt="logo"></a> ColoredCow Tehri. </small>
    </div>
</footer>

<!-- bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>
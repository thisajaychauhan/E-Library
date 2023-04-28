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
            <a href="main-page.php" class="btn bg-light text-dark fw-bold" role="button" name="submit" type="submit"><i class="fa fa-chevron-left"></i> back</a>
    </div>
</nav>

<!-- profile card -->
<form action="" method="post">
    <?php include 'connection.php';

    $data = $_SESSION['user_data'];
    $email = $data['1'];

    $query = "SELECT * FROM registration WHERE email = '$email' ";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    if ($row) {
    ?>
        <div class="container d-flex justify-content-center align-items-center">
            <div class="card col-lg-8">
                <div class="row g-0">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-3 d-flex justify-content-center align-items-center">
                        <img src="./uploadimg/monk.jpg" style="width:250px" class="img-fluid rounded-start">
                    </div>

                    <div class="text-capitalize col-12 col-sm-12 col-md-6 col-lg-6 p-3 justify-content-center align-items-center">
                        <div class="d-flex flex-row flex-wrap">
                            <h1 class="card-text text-capitalize"><?php echo $row['username']; ?></h1>
                        </div>
                        <div class="d-flex flex-row flex-wrap mt-2 text-success">
                            <h6 class="card-text text-capitalize"><?php echo $row['email']; ?></h6>
                        </div>
                        <div class="d-flex">
                            <div class="m-3">
                                <h6 class="card-title text-danger">role: </h6>
                                <h6 class="card-text text-justify"><?php echo $row['role']; ?></h6>
                            </div>
                            <div class="m-3">
                                <h6 class="card-title text-danger">verify status: </h6>
                                <h6 class="card-text text-justify"><?php echo $row['verify_status']; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</form>


<!-- footer -->
<footer class="bg-dark text-center fixed-bottom">
    <div class="container text-white p-1">
        <small>&copy; E-Library 2023. Made in <a href="https://coloredcow.com/"><img style="width:16px" class="mb-1" src="ColoredCow-logo-white.png" alt="logo"></a> ColoredCow Tehri. </small>
    </div>
</footer>
<!-- session IN -->
<?php include 'session/sessionIN.php'; ?>

<!-- html header -->
<?php include 'partials/html-header.php'; ?>


<!-- navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-medium fs-3 text-white" href="#">E-library</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <?php if (isset($_SESSION['user_data'])) {
                    $data = $_SESSION['user_data'];
                    $role = $data['0'];
                    if ($role == 'admin') {
                ?>
                        <div style="display: flex;">
                            <!-- edit button -->
                            <li> <a href="edit-book.php?id=<?= $_GET['id']; ?>" class="btn btn-primary m-1" role="button">Edit</a></li>

                            <!-- delete button -->
                            <li> <a href="deletebook.php?id=<?= $_GET['id']; ?>" class="btn btn-danger m-1" role="button">Delete</a></li>
                        </div>
                <?php }
                }
                ?>

            </ul>
        </div>
    </div>
</nav>


<!-- tagline -->
<?php include 'partials/tagline.php'; ?>

<form action="" method="post">
    <?php
    include 'connection.php';
    $new_id = isset($_GET['id']) ? $_GET['id'] : '';

    $query = "SELECT * FROM bookdetail WHERE id = '$new_id' ";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    if ($row) {
    ?>
        <div class="container justify-content-center">
            <div class="card">
                <div class="row g-0">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 p-3 d-flex justify-content-center align-items-center">
                        <img src="uploadimg/<?php echo $row['uploadimgDB']; ?>" style="width:350px" class="img-fluid rounded-start">
                    </div>

                    <div class="text-capitalize col-12 col-sm-12 col-md-12 col-lg-8 p-3">
                        <div class="d-flex flex-row flex-wrap">
                            <h5 class="card-title text-danger">Book name: &nbsp;</h5>
                            <h5 class="card-text text-capitalize"><?php echo $row['bookname']; ?></h5>
                        </div>
                        <div class="d-flex flex-row flex-wrap">
                            <h5 class="card-title text-danger">Author name: &nbsp;</h5>
                            <h5 class="card-text text-capitalize"><?php echo $row['authorname']; ?></h5>
                        </div>
                        <div class="">
                            <h5 class="card-title text-danger">Description: </h5>
                            <h6 class="card-text text-justify"><?php echo $row['description']; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
        ?>
</form>

<!-- footer -->
<?php include 'partials/footer.php'; ?>

</body>

</html>
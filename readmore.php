<!-- session IN -->
<?php include 'session/sessionIN.php'; ?>

<!-- html header -->
<?php include 'partials/html-header.php'; ?>


<!-- navbar -->

<nav class="navbar navbar-expand-lg bg-dark">
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
                            <li> <a href="edit-book.php?id=<?= $_GET['id']; ?>" class="btn btn-primary m-1" role="button">edit</a></li>

                            <!-- delete button -->
                            <li> <a href="deletebook.php?id=<?= $_GET['id']; ?>" class="btn btn-danger m-1" role="button">delete</a></li>
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
        <div class="rmcontainer">
            <div class="rmcover">
                <div class="rmdetail">
                    <div class="rmimg">
                        <img src="uploadimg/<?php echo $row['uploadimgDB']; ?>" style="width:200px; height:280px;">
                    </div>
                    <div class="bookdetail">
                        <h3><?php echo $row['id']; ?></h3>

                        <label for="">book name</label>
                        <h3><?php echo $row['bookname']; ?></h3>

                        <label for="">author name</label>
                        <h3><?php echo $row['authorname']; ?></h3>

                        <label for="">description</label>
                        <h3><?php echo $row['description']; ?></h3>
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
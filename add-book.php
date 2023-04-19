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
            <a href="main-page.php" class="btn bg-light text-dark fw-bold" role="button" name="submit" type="submit"><i class="fa fa-arrow-left"></i> back</a>
    </div>
</nav>

<!-- /tagline -->
<?php include 'partials/tagline.php'; ?>


<?php
include 'connection.php';

if (isset($_POST['submit'])) {

    $bookname = $_POST['bookname'];
    $authorname = $_POST['authorname'];
    $description = $_POST['description'];

    $imgname = $_FILES['upload']['name'];
    $tempname = $_FILES['upload']['tmp_name'];
    move_uploaded_file($tempname, 'uploadimg/' . $imgname);

    $save_bookdetail = "INSERT INTO bookdetail (bookname,authorname,description,uploadimgDB)
    VALUES('$bookname','$authorname','$description','$imgname')";
    $result = mysqli_query($con, $save_bookdetail);

    if ($result) {
        echo "<script>alert('book added successfully')</script>";
?>
        <meta http-equiv="refresh" content="0; url = http://localhost:8888/main-page.php" />
<?php
    } elseif (!$reault) {
        echo 'fail';
        header("location:add-book.php");
    }
}
?>

<!-- main -->
<div class="container mb-3">
    <div class="d-flex justify-content-center align-items-center">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="fw-bold" for="bookname">Book Name</label>
                                <input type="text" class="form-control" id="bookname" name="bookname">
                            </div>
                            <div class="form-group">
                                <label class="fw-bold" for="authorname">Author Name</label>
                                <input type="text" class="form-control" id="authorname" name="authorname">
                            </div>
                            <div class="form-group">
                                <label class="fw-bold" for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <div class="form-group text-center">
                            <label class="fw-bold mb-2" class="fw-bold" for="upload">Upload Image</label>
                            <input type="file" class="form-control" id="upload" name="upload">
                        </div>
                    </div>
                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary form-control" name="submit">Add a Book</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>



<!-- footer -->
<?php include 'partials/footer.php' ?>

</body>

</html>
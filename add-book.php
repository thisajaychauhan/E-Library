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
            <a href="main-page.php" class="btn btn-light fw-bold" role="button" name="submit" type="submit"><i class="fa fa-arrow-left"></i> back</a>
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
        echo "<script>alert('book Updated successfully')</script>";
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
<form action="" enctype="multipart/form-data" method="post">
    <div class="container justify-content-center">
        <div class="card mb-3 d-flex">
            <div class="card-body col-12 col-sm-12 col-md-6 col-lg-6 d-flex flex-column">
                <label for="">book name</label>
                <input class="addbookinput" type="text" name="bookname">
                <label for="">author name</label>
                <input class="addbookinput" type="text" name="authorname">
                <label for="">description</label>
                <textarea name="description" cols="30" rows="10"></textarea>
            </div>

            <div class="card-body col-12 col-sm-12 col-md-6 col-lg-6 text-center">
                <div class="d-flex flex-column p-4">
                    <input class="upload-input" type="file" name="upload"></input>
                </div>

                <div class="d-flex flex-column p-4">
                    <input class="addbook-btn" value="Add a Book" type="submit" name="submit">
                </div>
            </div>
        </div>
    </div>
</form>

<!-- footer -->
<?php include 'partials/footer.php' ?>

</body>

</html>
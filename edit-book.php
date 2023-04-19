<!-- session IN -->
<?php include 'session/sessionIN.php'; ?>

<!-- html header -->
<?php include 'partials/html-header.php'; ?>

<!-- navbar -->
<?php include 'partials/navbar.php'; ?>

<!-- /tagline -->
<?php include 'partials/tagline.php'; ?>


<?php
include 'connection.php';

if (isset($_GET['id'])) {
  $edit_id = $_GET['id'];

  $edit_query = "SELECT * FROM bookdetail WHERE id = '$edit_id' ";
  $result = mysqli_query($con, $edit_query);
  $single_row = mysqli_fetch_array($result);
}

if (isset($_POST['submit'])) {
  $edit_id = $_GET['id'];


  $update_bookname = $_POST['bookname'];
  $update_authorname = $_POST['authorname'];
  $update_description = $_POST['description'];

  if ($_FILES['upload']['name'] != "") {
    $update_imgname = $_FILES['upload']['name'];
    $tempname = $_FILES['upload']['tmp_name'];
    move_uploaded_file($tempname, 'uploadimg/' . $update_imgname);
  } else {
    $update_imgname = $_POST['oldimg'];
  }

  $edit_query = "SELECT * FROM bookdetail WHERE id = '$edit_id' ";
  $result = mysqli_query($con, $edit_query);
  $single_row = mysqli_fetch_array($result);

  if ($single_row['bookname'] == $update_bookname && $single_row['authorname'] == $update_authorname && $single_row['description'] == $update_description && $single_row['uploadimgDB'] == $update_imgname) {
    echo "<script>alert('No changes have been made to the book details.')</script>";
?>
    <meta http-equiv="refresh" content="0; url = http://localhost:8888/main-page.php" />
    <?php
  } else {
    $save_bookdetail = "UPDATE bookdetail SET bookname = '$update_bookname',authorname ='$update_authorname', description = '$update_description', uploadimgDB = '$update_imgname' WHERE id = '$edit_id' ";
    $run_bookdetail = mysqli_query($con, $save_bookdetail);

    if ($run_bookdetail) {
      echo "<script>alert('Book Updated Successfully')</script>";
    ?>
      <meta http-equiv="refresh" content="0; url = http://localhost:8888/main-page.php" />
<?php
    }
  }
}
?>

<!-- main -->
<form action="" enctype="multipart/form-data" method="post">
  <div class="container">
    <div class="card">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 p-3">
          <div class="d-flex flex-column justify-content-center align-items-center">
            <label class="mb-1 fw-bold fs-5 text-capitalize bg-dark text-light text-center" style="width:350px">old image</label>
            <img src="uploadimg/<?php echo  $single_row['uploadimgDB'] ?>" style="width:350px" class="img-fluid rounded-start">
            <input type="hidden" name="oldimg" value="<?php echo  $single_row['uploadimgDB'] ?>">
          </div>
        </div>


        <div class="text-capitalize col-12 col-sm-12 col-md-12 col-lg-6 p-3">
          <div class="justify-content-center align-items-center">
            <label class="mb-2 fw-bold">choose new image</label>
            <input class="form-control " type="file" name="upload" value="<?php echo $update_imgname['uploadimgDB']; ?>">

            <div class="mb-3">
              <label for="bookname" class="form-label fw-bold">Book Name</label>
              <input type="text" name="bookname" class="form-control" id="bookname" value="<?= $single_row['bookname']; ?>">
            </div>
            <div class="mb-3">
              <label for="authorname" class="form-label fw-bold">Author Name</label>
              <input type="text" name="authorname" class="form-control" id="authorname" value="<?= $single_row['authorname']; ?>">
            </div>
            <div class="mb-3">
              <label for="description" class="form-label fw-bold">Description</label>
              <textarea name="description" class="form-control" cols="30" rows="10" id="description"><?= $single_row['description']; ?></textarea>
            </div>
            <div class="">
              <button type="submit" name="submit" class="btn btn-primary col-12">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>


<!-- footer -->
<?php include 'partials/footer.php'; ?>

</body>

</html>
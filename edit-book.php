
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



<form action="" enctype="multipart/form-data" method="post">
    <section class="edit">
        <div class="editimg">
            <div>
                <label>old image</label>
                <img src="uploadimg/<?php echo  $single_row['uploadimgDB'] ?>" alt="" style="width:150px; height:200px; margin-right:20px;">
                <input type="hidden" name="oldimg" value="<?php echo  $single_row['uploadimgDB'] ?>">
            </div>

            <div>
                <label>choose new image</label>
                <input type="file" name="upload" value="<?php echo $update_imgname['uploadimgDB']; ?>">
            </div>


        </div>

        <div class="editdetail">
            <label for="">bookname</label>
            <input class="editinput" type="text" name="bookname" value="<?= $single_row['bookname']; ?>">

            <label for="">authorname</label>
            <input class="editinput" type="text" name="authorname" value="<?= $single_row['authorname']; ?>">

            <label for="">description</label>
            <input class="editinput" type="text" name="description" value="<?= $single_row['description']; ?>">

            <input class="editupdatebtn" type="submit" value="save" name="submit">
        </div>
    </section>
</form>

<!-- footer -->
<?php include 'partials/footer.php'; ?>

</body>

</html>
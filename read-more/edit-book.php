<?php
if (isset($_POST['submit'])) {
    $bookname = $_POST['bookname'];
    $authorname = $_POST['authorname'];
    $description = $_POST['description'];


    if (isset($_FILES['upload']['name']) && ($_FILES['upload']['name']!="")) {
        $filename = $_FILES['upload']['name'];
        $tempname = $_FILES['upload']['tmp_name'];

        // delete old file
        unlink("upload/$old_image");
        // add new img
        move_uploaded_file($tempname, 'upload/' . $filename);
    } else {
        $filename = $old_image;
    }
    $update = mysqli_query($con, "UPDATE e-library SET bookname='$bookname', authorname='$authorname', description='$description', upload = '$filename'");

    if ($update) {
        echo "<script>alert('data inserted successfully')</script>";
    } else {
        echo "<script>alert('insertion failed')</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include 'connection.php';

    $id = $_GET['id'];
    $query = "SELECT * FROM e-library WHERE id = '$id' ";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    ?>

    <form action="" method="post" enctype="multipart/form-data">

        <div class="rmcontainer">
            <div class="rmcover">
                <div class="rmbook">
                    <div class="bookimg">
                        <img class="rmimg" src="upload/<?php echo $row['upload']; ?>" alt="">
                        <input type="file" name="upload" />
                    </div>
                </div>

                <div class="rmdetail">
                    <div class="bookdetail">
                        <label for="">Book Name</label>
                        <input type="text" name="bookname" value="<?= $row['bookname']; ?>">
                        <label for="">Author Name</label>
                        <input type="text" name="authorname" value="<?= $row['authorname']; ?>">
                        <label for="">Description</label>
                        <input type="text" name="description" value="<?= $row['description']; ?>">

                        <input type="submit" value="update" name="submit">
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>
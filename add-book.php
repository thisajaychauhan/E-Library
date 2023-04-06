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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">


</head>
<title>E-library</title>
</head>

<body>

    <!-- navbar -->

    <nav>
        <p><a href="">E-library</a></p>
        <button class="btn"><a href="main-page.php">back to list</a></button>
    </nav>



    <!-- tagline -->

    <section>
        <p>Read and grow</p>
    </section>


    <!-- main -->

    <div class="container-add">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="flexadd">
                <div class="inner">
                    <label for="">book name</label>
                    <input type="text" name="bookname">
                    <label for="">author name</label>
                    <input type="text" name="authorname">
                    <label for="">description</label>
                    <textarea name="description" cols="30" rows="10"></textarea>
                </div>


                <div class="addbookimg">
                    <div class="inneraddbook">
                        <div class="uploadimage">
                            <input class="upload-input" type="file" name="upload"></input>
                        </div>
                        <div class="adbutton">
                            <input class="addbook-btn" value="Add a Book" type="submit" name="submit">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>
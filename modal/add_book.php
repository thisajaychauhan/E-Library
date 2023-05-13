<?php
include '../config/connection.php';
$save_bookdetail = "INSERT INTO bookdetail (bookname,authorname,description,uploadimgDB,total_books) VALUES('$bookname','$authorname','$description','$imgname', '$totalbook')";
$result = mysqli_query($con, $save_bookdetail);

if ($result) {
    echo "<script>alert('book added successfully')</script>";
?>
    <meta http-equiv="refresh" content="0; url = http://localhost:8888/view/main_page.view.php" />
<?php
} elseif (!$reault) {
    echo 'fail';
    header("location:add_book.view.php");
}

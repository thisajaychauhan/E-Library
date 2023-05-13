<?php
include '../config/connection.php';

if (isset($_POST['submit'])) {

    $bookname = $_POST['bookname'];
    $authorname = $_POST['authorname'];
    $description = $_POST['description'];
    $totalbook = $_POST['totalbook'];

    $imgname = $_FILES['upload']['name'];
    $tempname = $_FILES['upload']['tmp_name'];
    move_uploaded_file($tempname, 'uploadimg/' . $imgname);

  include '../modal/add_book.php';
}
?>
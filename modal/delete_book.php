<?php
include '../config/connection.php';

// delteion of book
$del_id = $_GET['id'];

$del_query = "DELETE FROM bookdetail WHERE id='$del_id' ";
$del_book_result = mysqli_query($con, $del_query);

// for deletion of book
if ($del_book_result) {
    echo "<script>alert('Book Deleted successfully')</script>";
?>
    <meta http-equiv="refresh" content="0; url = http://localhost:8888/view/main_page.view.php" />
<?php
}

?>
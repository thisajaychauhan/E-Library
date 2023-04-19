<?php
include 'connection.php';
$del_id = $_GET['id'];

$del_query = "DELETE FROM bookdetail WHERE id='$del_id' ";
$del_book_result = mysqli_query($con, $del_query);

// for deletion of BOOK
if ($del_book_result) {
    echo "<script>alert('Book Deleted successfully')</script>";
    ?>
    <meta http-equiv="refresh" content="0; url = http://localhost:8888/main-page.php" />
    <?php
}


// //for deletion of ADMIN

$del_admin_query = "DELETE FROM registration WHERE id='$del_id' ";
$del_admin_result = mysqli_query($con, $del_admin_query);

if ((mysqli_affected_rows($con)) > 0) {
    echo "<script>alert('admin Deleted successfully')</script>";
?>
    <meta http-equiv="refresh" content="0; url = http://localhost:8888/alladmins.php" />
<?php
}
?>
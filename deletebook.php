<?php
include 'connection.php';
$del_id = $_GET['id'];

$del_query = "DELETE FROM bookdetail WHERE id='$del_id' ";
$result = mysqli_query($con, $del_query);

if ($result) {
    echo "<script>alert('book Deleted successfully')</script>";
?>
    <meta http-equiv="refresh" content="0; url = http://localhost:8888/main-page.php" />
<?php
} else {
    echo "Failed";
}
?>
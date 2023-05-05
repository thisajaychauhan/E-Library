<?php
include '../connection.php';

if (isset($_GET['admin_id'])) {
    $admin_id = $_GET['admin_id'];

    $edit_query = "SELECT * FROM registration WHERE role = 'admin' AND id = '$admin_id' ";
    $result = mysqli_query($con, $edit_query);
    $single_row = mysqli_fetch_array($result);
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $edit_query = "SELECT * FROM registration WHERE id = '$admin_id' ";
    $result = mysqli_query($con, $edit_query);
    $single_row = mysqli_fetch_array($result);

    $save_admindetail = "UPDATE registration SET username = '$username',email ='$email', role = '$role', password = '$password' WHERE id = '$admin_id' ";
    $run_admindetail = mysqli_query($con, $save_admindetail);

    if ($run_admindetail) {
        echo "<script>alert('Admin Profile Updated Successfully')</script>";
?>
        <meta http-equiv="refresh" content="0; url = http://localhost:8888/alladmins.php" />
<?php
    }
}
?>
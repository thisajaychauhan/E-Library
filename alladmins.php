<!-- session IN -->
<?php include 'session/sessionIN.php'; ?>

<!-- html header -->
<?php include 'partials/html-header.php'; ?>

<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
        <a class="navbar-brand fw-medium fs-3 text-white" href="#">E-library <i class="fa fa-book-open-cover"></i></a>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">

            <!-- Back button -->
            <a href="main-page.php" class="btn bg-light text-dark fw-bold" role="button" name="submit" type="submit"><i class="fa fa-chevron-left"></i> back</a>
    </div>
</nav>

<!-- /tagline -->
<?php include 'partials/tagline.php'; ?>


<div class="container">
    <ul class="nav nav-pills" role="tablist">
        <li class="active">
            <a class="nav-link rounded-0 border" data-toggle="tab" href="#admin" role="tab"> admin detail</a>
        </li>
        <li class="">
            <a class="nav-link rounded-0 border" data-toggle="tab" href="#user" role="tab">user detail</a>
        </li>
    </ul>

    <div class="tab-content clearfix text-center">
        <!-- admin detail tab -->
        <div class="tab-pane active" id="admin">
            <?php
            include 'connection.php';

            // to delete book from wish-list

            if (isset($_GET['delete_id'])) {
                $id = $_GET['delete_id'];

                $sql = "DELETE FROM registration WHERE id = '$id'";
                $result = mysqli_query($con, $sql);

                if ($result) {
                    echo "<script>confirm('Are you sure want to delete')</script>";
            ?>
                    <meta http-equiv="refresh" content="0; url = http://localhost:8888/alladmins.php" />
                <?php
                }
            }

            // admin detail 

            $alladmin_query = "SELECT * FROM registration WHERE role = 'admin' ";
            $result = mysqli_query($con, $alladmin_query);
            if ($row = mysqli_num_rows($result)) {
                ?>
                <div>
                    <table class="table table-bordered table-hover table-sm text-center">
                        <tr class="table-dark text-capitalize">
                            <th>S no.</th>
                            <th>id</th>
                            <th>role</th>
                            <th>username</th>
                            <th>e-mail</th>
                            <th>verify status</th>
                            <?php
                            if (isset($_SESSION['user_data'])) {
                                $data = $_SESSION['user_data'];
                                $role = $data['0'];
                                if ($role == 'superadmin') {
                            ?>
                                    <th>update</th>
                                    <th>delete</th>
                            <?php }
                            } ?>

                        </tr>
                        <tr>
                            <?php
                            $a = 1;
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <td><?= $a; ?></td>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['role']; ?></td>
                                <td><?= $row['username']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['verify_status']; ?></td>

                                <?php
                                if (isset($_SESSION['user_data'])) {
                                    $data = $_SESSION['user_data'];
                                    $role = $data['0'];
                                    if ($role == 'superadmin') {
                                ?>
                                        <td><a href="edit_admin.php?admin_id=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a></td>
                                        <td><a href="?delete_id=<?php echo $row['id']; ?>"><i class="fa fa-trash text-danger"></i></a></td>
                                <?php }
                                } ?>
                        </tr>
                <?php
                                $a++;
                            }
                        }
                ?>
                    </table>
                </div>
        </div>

        <!-- user detail tab -->
        <div class="tab-pane" id="user">
            <?php include 'connection.php';

            // to delete book from wish-list
            if (isset($_GET['del_user_id'])) {
                $id = $_GET['del_user_id'];

                $sql = "DELETE FROM registration WHERE id = '$id'";
                $result = mysqli_query($con, $sql);

                if ($result) {
                    echo "<script>confirm('Are you sure want to delete')</script>";
            ?>
                    <meta http-equiv="refresh" content="0; url = http://localhost:8888/alladmins.php" />
                <?php
                }
            }

            // user details

            $all_user_query = "SELECT * FROM registration WHERE role = 'user' ";
            $result = mysqli_query($con, $all_user_query);
            if ($row = mysqli_num_rows($result)) {
                ?>
                <div>
                    <table class="table table-bordered table-hover table-sm text-center">
                        <tr class="table-dark text-capitalize">
                            <th>S no.</th>
                            <th>id</th>
                            <th>role</th>
                            <th>username</th>
                            <th>e-mail</th>
                            <th>verify status</th>
                            <th>delete</th>
                        </tr>
                        <tr>
                            <?php
                            $a = 1;
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <td><?= $a; ?></td>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['role']; ?></td>
                                <td><?= $row['username']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['verify_status']; ?></td>
                                <td><a href="?del_user_id=<?php echo $row['id']; ?>"><i class="fa fa-trash text-danger"></i></a></td>
                        </tr>
                <?php
                                $a++;
                            }
                        }
                ?>
                    </table>
                </div>
        </div>
    </div>
</div>

<!-- bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- footer -->
<footer class="bg-dark text-center fixed-bottom">
    <div class="container text-white p-1">
        <small>&copy; E-Library 2023. Made in <a href="https://coloredcow.com/"><img style="width:16px" class="mb-1" src="ColoredCow-logo-white.png" alt="logo"></a> ColoredCow Tehri. </small>
    </div>
</footer>

</body>

</html>
<!-- session IN -->
<?php include 'session/sessionIN.php'; ?>

<!-- html header -->
<?php include 'partials/html-header.php'; ?>

<!-- navbar -->
<?php include 'partials/navbar.php'; ?>

<!-- /tagline -->
<?php include 'partials/tagline.php'; ?>


<div class="container">
    <ul class="nav nav-pills" role="tablist">
        <li class="active ">
            <a class="nav-link rounded-0 bg-dark text-light" data-toggle="tab" href="#admin" role="tab"> admin detail</a>
        </li>
        <li class="">
            <a class="nav-link rounded-0 " data-toggle="tab" href="#user" role="tab">user detail</a>
        </li>
    </ul>

    <div class="tab-content text-center">
        <!-- admin detail tab -->
        <div class="tab-pane active" id="admin">
            <?php
            include 'connection.php';

            $alladmin_query = "SELECT * FROM registration WHERE role = 'admin' ";
            $result = mysqli_query($con, $alladmin_query);
            if ($row = mysqli_num_rows($result)) {
            ?>
                <div class="">
                    <table class="table table-bordered table-hover table-sm text-center">
                        <tr class="table-dark text-capitalize">
                            <th>id</th>
                            <th>role</th>
                            <th>username</th>
                            <th>e-mail</th>
                            <th>verify status</th>
                            <th>update</th>
                            <th>delete</th>
                        </tr>
                        <tr>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <th class="fw-normal"><?= $row['id']; ?></th>
                                <th class="fw-normal"><?= $row['role']; ?></th>
                                <th class="fw-normal"><?= $row['username']; ?></th>
                                <th class="fw-normal"><?= $row['email']; ?></th>
                                <th class="fw-normal"><?= $row['verify_status']; ?></th>
                                <th><a href="edit-book.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a></th>
                                <th><a href="deletebook.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash text-danger"></i></a></th>
                        </tr>
                <?php
                            }
                        }
                ?>
                    </table>
                </div>


        </div>
        <div class="tab-pane" id="user">
            <!-- user detail tab -->
            <?php
            include 'connection.php';

            $all_user_query = "SELECT * FROM registration WHERE role = 'user' ";
            $result = mysqli_query($con, $all_user_query);
            if ($row = mysqli_num_rows($result)) {
            ?>
                <div>
                    <table class="table table-bordered table-hover table-sm text-center">
                        <tr class="table-dark text-capitalize">
                            <th>id</th>
                            <th>role</th>
                            <th>username</th>
                            <th>e-mail</th>
                            <th>verify status</th>
                            <th>update</th>
                            <th>delete</th>
                        </tr>
                        <tr>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <th class="fw-normal"><?= $row['id']; ?></th>
                                <th class="fw-normal"><?= $row['role']; ?></th>
                                <th class="fw-normal"><?= $row['username']; ?></th>
                                <th class="fw-normal"><?= $row['email']; ?></th>
                                <th class="fw-normal"><?= $row['verify_status']; ?></th>
                                <th><a href="edit-book.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a></th>
                                <th><a href="deletebook.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash text-danger"></i></a></th>
                        </tr>
                <?php
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
        <small>&copy; E-Library 2023. Made with &#10084; in <a href="https://coloredcow.com/"><img style="width:16px" src="ColoredCow-logo-white.png" alt="logo"></a> ColoredCow Tehri. </small>
    </div>
</footer>

</body>

</html>
<!-- session IN -->
<?php include 'session/sessionIN.php'; ?>

<!-- html header -->
<?php include 'partials/html-header.php'; ?>

<!-- navbar -->
<?php include 'partials/navbar.php'; ?>

<!-- /tagline -->
<?php include 'partials/tagline.php'; ?>


<?php
include 'connection.php';

$allbook_query = "SELECT * FROM bookdetail";
$result = mysqli_query($con, $allbook_query);
if ($row = mysqli_num_rows($result)) {
?>
    <div class="container-fluid">
        <table class="table table-bordered table-hover text-capitalize table-sm text-center">
            <tr class="table-dark">
                <th>id</th>
                <th>book name</th>
                <th>author name</th>
                <th>book image</th>
            </tr>
            <tr >
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <th class="fw-normal"><?= $row['id']; ?></th>
                    <th class="fw-normal"><?= $row['bookname']; ?></th>
                    <th class="fw-normal"><?= $row['authorname']; ?></th>
                    <th class="fw-normal"><img class="indeximg" src="uploadimg/<?= $row['uploadimgDB']; ?>" style="width: 20px; height:30px;"></th>
            </tr>

    <?php
                }
            }
    ?>
        </table>
    </div>


<!-- footer -->
<footer class="bg-dark text-center fixed">
    <div class="container text-white p-1">
    <small>&copy; E-Library 2023. Made in  <a href="https://coloredcow.com/"><img style="width:16px" class="mb-1" src="ColoredCow-logo-white.png" alt="logo"></a> ColoredCow Tehri. </small>
    </div>
</footer>

    </body>

    </html>
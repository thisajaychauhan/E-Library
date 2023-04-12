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
    <div class="container">
        <table class="table table-hover table-sm text-center">
            <tr class="table-dark">
                <th>id</th>
                <th>Book name</th>
                <th>Author name</th>
                <th>Book image</th>
            </tr>
            <tr class="fw-normal">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <th><?= $row['id']; ?></th>
                    <th><?= $row['bookname']; ?></th>
                    <th><?= $row['authorname']; ?></th>
                    <th><img class="indeximg" src="uploadimg/<?= $row['uploadimgDB']; ?>" style="width: 30px; height:50px;"></th>
            </tr>

    <?php
                }
            }
    ?>
        </table>
    </div>


    <!-- footer -->
    <?php include 'partials/footer.php' ?>

    </body>

    </html>
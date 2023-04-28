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


<?php
include 'connection.php';

$allbook_query = "SELECT * FROM bookdetail";
$result = mysqli_query($con, $allbook_query);
if ($row = mysqli_num_rows($result)) {
?>
    <div class="container">
        <table class="table table-bordered table-hover text-capitalize table-sm text-center">
            <tr class="table-dark">
                <th>book id</th>
                <th>book name</th>
                <th>author name</th>
                <th>total books</th>
                <th>available books</th>
                <th>book image</th>
            </tr>
            <tr >
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['bookname']; ?></td>
                    <td><?= $row['authorname']; ?></td>
                    <td><?= $row['total_books']; ?></td>
                    <td><?= $row['available_book']; ?></td>
                    <td><img class="indeximg" src="uploadimg/<?= $row['uploadimgDB']; ?>" style="width: 20px; height:30px;"></td>
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
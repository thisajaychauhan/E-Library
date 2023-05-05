<!-- session IN -->
<?php include '../session/sessionIN.php'; ?>

<!-- html header -->
<?php include '../partials/html-header.php'; ?>

<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
        <a class="navbar-brand fw-medium fs-3 text-white" href="#">E-library <i class="fa fa-book-open-cover"></i></a>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">

            <!-- Back button -->
            <a href="./main_page.view.php" class="btn bg-light text-dark fw-bold" role="button" name="submit" type="submit"><i class="fa fa-chevron-left"></i> back</a>
    </div>
</nav>

<!-- /tagline -->
<?php include '../partials/tagline.php'; ?>

<!-- controller -->
<?php include '../modal/book_detail.php'; ?>

<!-- modal -->
<?php include '../controller/all_books.php'; ?>

<!-- main -->
<div class="container">
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
            <?php
            foreach ($books as $book) {
            ?>
                <tr>
                    <td><?= $book['id']; ?></td>
                    <td><?= $book['bookname']; ?></td>
                    <td><?= $book['authorname']; ?></td>
                    <td><?= $book['total_books']; ?></td>
                    <td><?= $book['available_book']; ?></td>
                    <td><img class="indeximg" src="../uploadimg/<?= $book['uploadimgDB']; ?>" style="width: 20px; height:30px;"></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>

<!-- footer -->
<footer class="bg-dark text-center fixed">
    <div class="container text-white p-1">
        <small>&copy; E-Library 2023. Made in <a href="https://coloredcow.com/"><img style="width:16px" class="mb-1" src="../ColoredCow-logo-white.png" alt="logo"></a> ColoredCow Tehri. </small>
    </div>
</footer>

</body>

</html>
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
            <a href="../view/main_page.view.php" class="btn bg-light text-dark fw-bold" role="button" name="submit" type="submit"><i class="fa fa-chevron-left"></i> back</a>
    </div>
</nav>

<!-- /modal -->
<?php include '../partials/tagline.php'; ?>

<!-- controller -->
<?php include '../controller/issue_book.php'; ?>


<!-- main -->
<form action="" enctype="multipart/form-data" method="post">
    <div class="container">
        <div class="card">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 p-3">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <label class="mb-1 fw-bold text-capitalize text-dark text-center">book cover</label>
                        <img src="../uploadimg/<?= $bookimage; ?>" style="width:380px" class="img-fluid rounded-start">
                    </div>
                </div>

                <div class="text-capitalize col-12 col-sm-12 col-md-12 col-lg-6 p-3">
                    <div class="justify-content-center align-items-center">

                        <div class="mb-2">
                            <label for="bookname" class="form-label fw-bold">Book Name</label>
                            <input type="text" name="bookname" class="form-control rounded-0" value="<?= $bookname; ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="authorname" class="form-label fw-bold">Author Name</label>
                            <input type="text" name="authorname" class="form-control rounded-0" value="<?= $authorname; ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="username" class="form-label fw-bold">User Name</label>
                            <input type="text" name="username" class="form-control rounded-0" value="<?= $username; ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label fw-bold">email</label>
                            <input type="email" name="email" class="form-control rounded-0" value="<?= $s_email; ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="book" class="form-label fw-bold text-danger">you can issue only one book</label>
                            <input type="text" name="no_book" min="0" max="1" class="form-control rounded-0" value="1" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="issued" class="form-label fw-bold">issued date</label>
                            <input type="text" name="issued_date" class="form-control rounded-0" value="<?php echo date("Y-m-d H:i:s"); ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="return" class="form-label fw-bold">return date</label>
                            <input type="text" name="return_date" class="form-control rounded-0" value="<?php echo date("Y-m-d", strtotime('+7 days')); ?>" readonly>
                        </div>

                        <div class="mt-5">
                            <button type="submit" name="submit" class="btn btn-primary col-12 text-capitalize rounded-0">get the book</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- footer -->
<?php include '../partials/footer.php'; ?>

</body>

</html>
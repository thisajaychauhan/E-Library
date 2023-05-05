<!-- session IN -->
<?php include 'session/sessionIN.php'; ?>

<!-- html header -->
<?php include 'partials/html-header.php'; ?>

<!-- navbar -->
<?php include 'partials/navbar.php'; ?>

<!-- /tagline -->
<?php include '../partials/tagline.php'; ?>

<!-- controller -->
<?php include '../partials/tagline.php'; ?>


<!-- main -->
<form action="" enctype="multipart/form-data" method="post">
    <div class="container">
        <div class="card">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 p-3">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <label class="mb-1 fw-bold fs-5 text-capitalize text-dark text-center">book cover</label>
                        <img src="uploadimg/<?= $bookimage; ?>" style="width:380px" class="img-fluid rounded-start">
                    </div>
                </div>

                <div class="text-capitalize col-12 col-sm-12 col-md-12 col-lg-6 p-3">
                    <div class="justify-content-center align-items-center">

                        <div class="mb-2">
                            <label for="bookname" class="form-label fw-bold">Book Name</label>
                            <input type="text" name="bookname" class="form-control" value="<?= $bookname; ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="authorname" class="form-label fw-bold">Author Name</label>
                            <input type="text" name="authorname" class="form-control" value="<?= $authorname; ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="username" class="form-label fw-bold">User Name</label>
                            <input type="text" name="username" class="form-control" value="<?= $username; ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label fw-bold">email</label>
                            <input type="email" name="email" class="form-control" value="<?= $s_email; ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="book" class="form-label fw-bold text-danger">you can issue only one book</label>
                            <input type="text" name="no_book" min="0" max="1" class="form-control" value="1" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="issued" class="form-label fw-bold">issued date</label>
                            <input type="text" name="issued_date" class="form-control" value="<?php echo date("Y-m-d H:i:s"); ?>" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="return" class="form-label fw-bold">return date</label>
                            <input type="text" name="return_date" class="form-control" value="<?php echo date("Y-m-d", strtotime('+7 days')); ?>" readonly>
                        </div>

                        <div class="mt-5">
                            <button type="submit" name="submit" class="btn btn-primary col-12 text-capitalize">get the book</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- footer -->
<?php include 'partials/footer.php'; ?>

</body>

</html>
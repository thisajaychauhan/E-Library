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

// get id of book
if (isset($_GET['id'])) {
    $id_book = $_GET['id'];

    // get user data from session
    $data = $_SESSION['user_data'];
    $username = $data['3'];
    $s_email = $data['1'];

    // get book data from bookdetail table
    $id_book = $_GET['id'];
    $query = "SELECT id,bookname,authorname,description,uploadimgDB,available_book,total_books FROM bookdetail WHERE id = '$id_book' ";
    $result = mysqli_query($con, $query);
    $check = mysqli_num_rows($result);

    if ($check) {
        $record = mysqli_fetch_assoc($result);
        $book_data = array($record['id'], $record['bookname'], $record['authorname'], $record['description'], $record['uploadimgDB'], $record['total_books'], $record['available_book']);
        $_SESSION['book_data'] = $book_data;
        $available_book = $record['available_book'];
        $total_books = $record['total_books'];
        $bookname = $record['bookname'];
        $authorname = $record['authorname'];
        $bookimage = $record['uploadimgDB'];
        // var_dump($book_data);
        // die();

        if (isset($_POST['submit'])) {

            $no_book = $_POST['no_book'];
            $issued_date = $_POST['issued_date'];
            $return_date = $_POST['return_date'];

            // check the book in issued book DB
            $duplicacy_query = "SELECT email FROM issued_book WHERE email = '$s_email'";
            $duplicacy_result = mysqli_query($con, $duplicacy_query);
            $record = mysqli_fetch_assoc($duplicacy_result);
            $db_email = $record['email'];

            if ($s_email !== $db_email) {

                // insert data into issued_book when click on wish-to-read button
                $query = "INSERT INTO issued_book (book_id, username, email, bookname, bookimg, no_of_book, issue_date, return_date) VALUES('$id_book','$username','$s_email','$bookname','$bookimage',' $no_book','$issued_date',' $return_date')";
                $results = mysqli_query($con, $query);

                if ($results) {
                    $update_query = "UPDATE bookdetail SET available_book = $available_book-1 WHERE id = '$id_book' ";
                    $update_result = mysqli_query($con, $update_query);
                }
                echo '<script>alert("Book added to issued book"); window.location.href = "main-page.php";</script>';
            } else {
                echo '<script>alert("Please return existing issued book"); window.location.href = "main-page.php";</script>';
            }
        }
    }
}
?>

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
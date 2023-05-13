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

<!-- tagline -->
<?php include '../partials/tagline.php'; ?>


<div class="container">
    <ul class="nav nav-pills" role="tablist">
        <?php if (isset($_SESSION['user_data'])) {
            $data = $_SESSION['user_data'];
            $role = $data['0'];
            if ($role == 'user') {
        ?>
                <li class="active">
                    <a class="nav-link rounded-0 border" data-toggle="tab" href="#wish" role="tab"> wish to read <i class="fa fa-heart"></i></a>
                </li>
                <li class="">
                    <a class="nav-link rounded-0 border" data-toggle="tab" href="#readed" role="tab">readed <i class="fa fa-check"></i> </a>
                </li>
                <li class="">
                    <a class="nav-link rounded-0 border" data-toggle="tab" href="#issued" role="tab">issued <i class="fa fa-book"></i> </a>
                </li>
    </ul>

    <div class="tab-content clearfix text-center">

        <!-- wish to read tab -->
        <div class="tab-pane active" id="wish">
            <?php
                include '../config/connection.php';
                // to delete book from wish-list
                if (isset($_GET['del_wish_id'])) {
                    $id = $_GET['del_wish_id'];

                    // get user data from session
                    $data = $_SESSION['user_data'];
                    $email = $data['1'];

                    $sql = "DELETE FROM user_book_details WHERE book_id = '$id' AND email = '$email' ";
                    $result = mysqli_query($con, $sql);
                    header("Location :/view/wishlist.view.php");
                }

                // wishlist button
                if (isset($_GET['wish_id'])) {
                    $id_book = $_GET['wish_id'];

                    // get user data from session
                    $data = $_SESSION['user_data'];
                    $username = $data['3'];
                    $email = $data['1'];

                    // check the book in wish-list
                    $duplicacy_query = "SELECT * FROM user_book_details WHERE book_id = '$id_book' AND username = '$username' AND email = '$email'";
                    $duplicacy_result = mysqli_query($con, $duplicacy_query);

                    if (mysqli_num_rows($duplicacy_result) > 0) {
                        echo '<script>alert("Book already added in wishlist"); window.location.href = "../view/main_page.view.php";</script>';
                    } else {
                        // get book data from bookdetail table
                        $query = "SELECT bookname,uploadimgDB FROM bookdetail WHERE id = '$id_book' ";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_array($result);
                        $bookname = $row['bookname'];
                        $bookimage = $row['uploadimgDB'];
                        // var_dump($row);die();

                        // insert data into user_book_details when click on wish-to-read button
                        $query = "INSERT INTO user_book_details (book_id,username, email, bookname, bookimg) VALUES('$id_book','$username','$email','$bookname','$bookimage')";
                        $results = mysqli_query($con, $query);

                        echo '<script>alert("Book added to wishlist"):window.location.href = "../view/main_page.view.php";</script>';
                    }
                }
            ?>
            <div>
                <table class="table table-bordered table-hover table-sm text-center">
                    <tr class="table-dark text-capitalize">
                        <th>S no.</th>
                        <th>book id</th>
                        <th>bookname</th>
                        <th>username</th>
                        <th>email</th>
                        <th class="text-center">book image</th>
                        <th class="text-center">delete</th>
                    </tr>

                    <tr>
                        <?php
                        $a = 1;
                        // get data from session
                        $data = $_SESSION['user_data'];
                        $email = $data['1'];

                        // data fetch from user_book_details
                        $search_query = "SELECT * FROM user_book_details WHERE email = '$email' ";
                        $result = mysqli_query($con, $search_query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <td><?php echo $a; ?></td>
                            <td><?php echo $row['book_id']; ?></td>
                            <td><?php echo $row['bookname']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td class="text-center"><img class="indeximg" src="../uploadimg/<?= $row['bookimg']; ?>" style="width: 20px; height:30px;"></td>
                            <td class="text-center"><a data-bs-toggle="modal" data-bs-target="#wish_del"><i class="fa fa-trash text-danger"></i></a></td>

                            <!-- Modal -->
                            <div class="modal fade" id="wish_del" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content rounded-0">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Item</h1>
                                            <button type="button" class="btn-close rounded-0" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to delete this item ?</h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
                                            <a type="button" class="btn btn-danger rounded-0" href="?del_wish_id=<?php echo $row['book_id']; ?>">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </tr>
                <?php
                            $a++;
                        }
                ?>
                </table>
            </div>
        </div>

        <!-- readed book detail tab -->
        <div class="tab-pane" id="readed">
            <?php
                include '../config/connection.php';
                // to delete book from book readed
                if (isset($_GET['read_del_id'])) {
                    $id = $_GET['read_del_id'];

                    // get user data from session
                    $data = $_SESSION['user_data'];
                    $email = $data['1'];

                    $sql = "DELETE FROM book_readed WHERE book_id = '$id' AND email = '$email'";
                    $result = mysqli_query($con, $sql);
                }

                // book readed button
                if (isset($_GET['readed_id'])) {
                    $id_book = $_GET['readed_id'];

                    // get user data from session
                    $data = $_SESSION['user_data'];
                    $username = $data['3'];
                    $email = $data['1'];

                    // check the book in wish-list
                    $duplicacy_query = "SELECT * FROM book_readed WHERE book_id = '$id_book' AND username = '$username' AND email = '$email'";
                    $duplicacy_result = mysqli_query($con, $duplicacy_query);

                    if (mysqli_num_rows($duplicacy_result) > 0) {
                        echo '<script>alert("Book already added in book readed"); window.location.href = "../view/main_page.view.php";</script>';
                    } else {
                        // current time
                        date_default_timezone_set('Asia/kolkata');
                        $readed_date = date("Y-m-d H:i:s");

                        // get book data from bookdetail table
                        $query = "SELECT bookname,uploadimgDB FROM bookdetail WHERE id = '$id_book' ";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_array($result);
                        $bookname = $row['bookname'];
                        $bookimage = $row['uploadimgDB'];

                        // insert data into user_book_details when click on book_readed button
                        $query = "INSERT INTO book_readed (book_id,username, email, bookname, bookimg,readed_date) VALUES('$id_book','$username','$email','$bookname','$bookimage','$readed_date')";
                        $results = mysqli_query($con, $query);
                        echo '<script>alert("Book added to readed");window.location.href = "../view/main_page.view.php";</script>';
                    }
                }
            ?>
            <div class="">
                <table class="table table-bordered table-hover table-sm text-center">
                    <tr class="table-dark text-capitalize">
                        <th>S no.</th>
                        <th>book id</th>
                        <th>bookname</th>
                        <th>username</th>
                        <th>email</th>
                        <th class="text-center">book image</th>
                        <th class="text-center">delete</th>
                    </tr>

                    <tr>
                        <?php
                        $a = 1;

                        // get email from session
                        $data = $_SESSION['user_data'];
                        $email = $data['1'];

                        // data fetch from book_readed table
                        $search_query = "SELECT * FROM book_readed WHERE email = '$email'";
                        $result = mysqli_query($con, $search_query);
                        while ($row = mysqli_fetch_array($result)) {

                        ?>
                            <td><?php echo $a; ?></td>
                            <td><?php echo $row['book_id']; ?></td>
                            <td><?php echo $row['bookname']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td class="text-center"><img class="indeximg" src="../uploadimg/<?= $row['bookimg']; ?>" style="width: 20px; height:30px;"></td>
                            <td class="text-center"><a data-bs-toggle="modal" data-bs-target="#modal"><i class="fa fa-trash text-danger"></i></a></td>

                            <?php
                            // modal popup
                            $link = '?read_del_id=' . $row['book_id'];
                            $body = 'Are you sure you want to delete this item ?';
                            $heading = 'Delete Item';
                            include '../partials/modal_popup.php';
                            ?>
                    </tr>
                <?php
                            $a++;
                        }
                ?>
                </table>
            </div>
        </div>


        <!-- issue book detail tab -->
        <div class="tab-pane" id="issued">
            <?php
                include '../config/connection.php';
                // to delete book from issued book
                if (isset($_GET['del_issue_id'])) {
                    $id = $_GET['del_issue_id'];

                    // get user data from session
                    $data = $_SESSION['user_data'];
                    $email = $data['1'];

                    // delete issued book
                    $sql = "DELETE FROM issued_book WHERE book_id = '$id' AND email ='$email' ";
                    $result = mysqli_query($con, $sql);

                    if ($result) {
                        // get available book data from 
                        $search_query = "SELECT available_book FROM bookdetail WHERE id ='$id' ";
                        $result = mysqli_query($con, $search_query);
                        $row = mysqli_num_rows($result);
                        if ($row) {
                            $record = mysqli_fetch_assoc($result);
                            $available_book = $record['available_book'];

                            $update_query = "UPDATE bookdetail SET available_book = $available_book + 1 WHERE id = '$id' ";
                            $update_result = mysqli_query($con, $update_query);
                        }
                    }
                }
            ?>

            <div class="">
                <table class="table table-bordered table-hover table-sm text-center">
                    <tr class="table-dark text-capitalize">
                        <th>S no.</th>
                        <th>book id</th>
                        <th>bookname</th>
                        <th>username</th>
                        <th>email</th>
                        <th>number of book</th>
                        <th>issued date</th>
                        <th>return date</th>
                        <th class="text-center">book image</th>
                        <th class="text-center">return</th>
                    </tr>

                    <tr>
                        <?php
                        $a = 1;

                        // get data from session
                        $data = $_SESSION['user_data'];
                        $email = $data['1'];

                        // issued button
                        $search_query = "SELECT * FROM issued_book WHERE email = '$email'";
                        $result = mysqli_query($con, $search_query);
                        while ($row = mysqli_fetch_array($result)) {

                        ?>
                            <td><?php echo $a; ?></td>
                            <td><?php echo $row['book_id']; ?></td>
                            <td><?php echo $row['bookname']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['no_of_book']; ?></td>
                            <td><?php echo $row['issue_date']; ?></td>
                            <td><?php echo $row['return_date']; ?></td>
                            <td class="text-center"><img class="indeximg" src="../uploadimg/<?= $row['bookimg']; ?>" style="width: 20px; height:30px;"></td>
                            <td class="text-center"><a type="button" class="btn rounded-0" href="?del_issue_id=<?php echo $row['book_id']; ?>" onclick="return confirm('Are you sure you want to return this book?')"><i class="fa fa-undo text-danger"></i></a></td>
                        <?php
                            $a++;
                        }
                    } else { ?>

                        <div class="container">
                            <table class="table table-bordered table-hover text-capitalize table-sm text-center">

                                <tr class="table-dark tect-center fs-4 text-capitalize">
                                    <th class=" fw-lighter" colspan="10">reader issued book</th>
                                </tr>

                                <tr class="table-dark">
                                    <th>S no.</th>
                                    <th>book id</th>
                                    <th>bookname</th>
                                    <th>username</th>
                                    <th>email</th>
                                    <th>number of book</th>
                                    <th>issued date</th>
                                    <th>return date</th>
                                    <th class="text-center">book image</th>
                                </tr>

                                <tr>
                                    <?php
                                    include '../config/connection.php';

                                    // all issued book list
                                    $search_query = "SELECT * FROM issued_book";
                                    $result = mysqli_query($con, $search_query);
                                    $a = 1;
                                    while ($row = mysqli_fetch_array($result)) { ?>
                                        <td><?php echo $a; ?></td>
                                        <td><?php echo $row['book_id']; ?></td>
                                        <td><?php echo $row['bookname']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['no_of_book']; ?></td>
                                        <td><?php echo $row['issue_date']; ?></td>
                                        <td><?php echo $row['return_date']; ?></td>
                                        <td class="text-center"><img class="indeximg" src="../uploadimg/<?= $row['bookimg']; ?>" style="width: 20px; height:30px;"></td>
                                </tr>
                        <?php
                                        $a++;
                                    }
                                } ?>
                            </table>
                        </div>
                    <?php } ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- footer -->
<footer class="bg-dark text-center fixed-bottom">
    <div class="container text-white p-1">
        <small>&copy; E-Library 2023. Made in <a href="https://coloredcow.com/"><img style="width:16px" class="mb-1" src="../image/ColoredCow-logo-white.png" alt="logo"></a> ColoredCow Tehri. </small>
    </div>
</footer>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- bootstrap -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>
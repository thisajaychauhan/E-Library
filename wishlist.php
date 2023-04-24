<!-- session IN -->
<?php include 'session/sessionIN.php'; ?>

<!-- html header -->
<?php include 'partials/html-header.php'; ?>

<!-- tagline -->
<?php include 'partials/tagline.php'; ?>



<div class="container">
    <ul class="nav nav-pills" role="tablist">
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
            include 'connection.php';
            // to delete book from wish-list
            if (isset($_GET['del_id'])) {
                $id = $_GET['del_id'];

                $sql = "DELETE FROM user_book_details WHERE book_id = '$id'";
                $result = mysqli_query($con, $sql);
                header("Location :wishlist.php");
            }

            // wishlist button
            if (isset($_GET['id'])) {

                // get user data from session
                $data = $_SESSION['user_data'];
                $username = $data['3'];
                $email = $data['1'];

                // get book data from bookdetail table
                $id_book = $_GET['id'];
                $query = "SELECT bookname,uploadimgDB FROM bookdetail WHERE id = '$id_book' ";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_array($result);
                $bookname = $row['bookname'];
                $bookimage = $row['uploadimgDB'];

                // check the book in wish-list
                $duplicacy_query = "SELECT book_id FROM user_book_details WHERE book_id = '$id_book'";
                $duplicacy_result = mysqli_query($con, $duplicacy_query);
                $record = mysqli_fetch_assoc($duplicacy_result);
                $db_book_id = $record['book_id'];

                if ($id_book !== $db_book_id) {
                    // insert data into user_book_details when click on wish-to-read button
                    $query = "INSERT INTO user_book_details (book_id,username, email, bookname, bookimage) VALUES('$id_book','$username','$email','$bookname','$bookimage')";
                    $results = mysqli_query($con, $query);
                    echo '<script>alert("Book added to wishlist"); window.location.href = "main-page.php";</script>';
                } else {
                    echo '<script>alert("Book already added in wishlist"); window.location.href = "main-page.php";</script>';
                }
            }


            // data fetch from user_book_details
            $search_query = "SELECT * FROM user_book_details";
            $result = mysqli_query($con, $search_query);
            if ($row = mysqli_num_rows($result)) {
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
                            // if ($row = mysqli_fetch_array($result)) {
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <th class="fw-normal"><?php echo $a; ?></th>
                                <th class="fw-normal"><?php echo $row['book_id']; ?></th>
                                <th class="fw-normal"><?php echo $row['bookname']; ?></th>
                                <th class="fw-normal"><?php echo $row['username']; ?></th>
                                <th class="fw-normal"><?php echo $row['email']; ?></th>
                                <th class="text-center"><img class="indeximg" src="uploadimg/<?= $row['bookimg']; ?>" style="width: 20px; height:30px;"></th>
                                <th class="text-center"><a href="?del_id=<?php echo $row['book_id']; ?>" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fa fa-trash text-danger"></i></a></th>
                        </tr>
                <?php
                                $a++;
                            }
                        }
                ?>
                    </table>
                </div>
        </div>

        <!-- readed book detail tab -->
        <div class="tab-pane" id="readed">
            <?php
            include 'connection.php';

            // readed button
            $search_query = "SELECT * FROM book_readed";
            $result = mysqli_query($con, $search_query);
            $row = mysqli_num_rows($result);

            ?>
            <div class="">
                <table class="table table-bordered table-hover table-sm text-center">
                    <tr class="table-dark text-capitalize">
                        <th>S no.</th>
                        <th>id</th>
                        <th>bookname</th>
                        <th>username</th>
                        <th>email</th>
                        <th class="text-center">book image</th>
                        <th class="text-center">delete</th>
                    </tr>

                    <tr>
                        <?php
                        $a = 1;
                        while ($row = mysqli_fetch_array($result)) {

                        ?>
                            <th class="fw-normal"><?php echo $a; ?></th>
                            <th class="fw-normal"><?php echo $row['book_id']; ?></th>
                            <th class="fw-normal"><?php echo $row['bookname']; ?></th>
                            <th class="fw-normal"><?php echo $row['username']; ?></th>
                            <th class="fw-normal"><?php echo $row['email']; ?></th>
                            <th class="text-center"><img class="indeximg" src="uploadimg/<?= $row['bookimg']; ?>" style="width: 20px; height:30px;"></th>
                            <th class="text-center"><a href="?delete_id=<?php echo $row['book_id']; ?>"><i class="fa fa-trash text-danger"></i></a></th>

                    </tr>
                <?php
                            $a++;
                        }
                ?>
                </table>
            </div>
        </div>



        <!-- issue bbok detail tab -->
        <div class="tab-pane" id="issued">
            <?php
            include 'connection.php';
            // to delete book from issued book
            if (isset($_GET['delete_id'])) {
                $id = $_GET['delete_id'];

                $sql = "DELETE FROM issued_book WHERE book_id = '$id'";
                $result = mysqli_query($con, $sql);
            }
            // issued button
            $search_query = "SELECT * FROM issued_book";
            $result = mysqli_query($con, $search_query);
            $row = mysqli_num_rows($result);

            ?>
            <div class="">
                <table class="table table-bordered table-hover table-sm text-center">
                    <tr class="table-dark text-capitalize">
                        <th>S no.</th>
                        <th>id</th>
                        <th>bookname</th>
                        <th>username</th>
                        <th>email</th>
                        <th>number of book</th>
                        <th>issued date</th>
                        <th>return date</th>
                        <th class="text-center">book image</th>
                        <th class="text-center">delete</th>
                    </tr>

                    <tr>
                        <?php
                        $a = 1;
                        while ($row = mysqli_fetch_array($result)) {

                        ?>
                            <th class="fw-normal"><?php echo $a; ?></th>
                            <th class="fw-normal"><?php echo $row['book_id']; ?></th>
                            <th class="fw-normal"><?php echo $row['bookname']; ?></th>
                            <th class="fw-normal"><?php echo $row['username']; ?></th>
                            <th class="fw-normal"><?php echo $row['email']; ?></th>
                            <th class="fw-normal"><?php echo $row['no_of_book']; ?></th>
                            <th class="fw-normal"><?php echo $row['issue_date']; ?></th>
                            <th class="fw-normal"><?php echo $row['return_date']; ?></th>
                            <th class="text-center"><img class="indeximg" src="uploadimg/<?= $row['bookimg']; ?>" style="width: 20px; height:30px;"></th>
                            <th class="text-center"><a href="?delete_id=<?php echo $row['book_id']; ?>" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fa fa-trash text-danger"></i></a></th>

                    </tr>
                <?php
                            $a++;
                        }
                ?>
                </table>
            </div>
        </div>
    </div>
</div>






<!-- footer -->
<footer class="bg-dark text-center fixed-bottom">
    <div class="container text-white p-1">
        <small>&copy; E-Library 2023. Made in <a href="https://coloredcow.com/"><img style="width:16px" class="mb-1" src="ColoredCow-logo-white.png" alt="logo"></a> ColoredCow Tehri. </small>
    </div>
</footer>

<!-- ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- bootstrap -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
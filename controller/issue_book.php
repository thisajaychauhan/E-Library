<?php
include '../config/connection.php';

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

            // if(mysqli_num_rows($duplicacy_result) > 0) {
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
                    echo '<script>alert("Book added to issued book"); window.location.href = "main_page.view.php";</script>';
                } else {
                    echo '<script>alert("Please return existing issued book"); window.location.href = "main_page.view.php";</script>';
                }
            }
        // }
    }
}

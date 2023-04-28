<!-- session IN -->
<?php include 'session/sessionIN.php'; ?>

<!-- html header -->
<?php include 'partials/html-header.php'; ?>

<!-- sidebar -->
<?php include 'partials/sidebar.php'; ?>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-medium fs-4 text-white" href="#">E-library <i class="fa fa-book-open-cover"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <?php if (isset($_SESSION['user_data'])) {
                    $data = $_SESSION['user_data'];
                    $role = $data['0'];
                    if ($role == 'user') {
                ?>
                        <!-- history sidebar button -->
                        <li><button class="btn btn-outline-light mx-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button"><i class="fa fa-history"></i></button></li>
                <?php }
                }
                ?>
                <!-- book issue button -->
                <li><a href="wishlist.php" class="btn btn-success text-white"><i class="fa fa-shopping-cart"></i></a></li>

                <!-- sorting button -->
                <div class="mx-1 d-flex">
                    <form action="" method="get" class="d-flex">
                        <select name="sort_alphabet" class="form-control">
                            <option value="">sort as</option>
                            <option value="a-z" <?php if (isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "a-z") {
                                                    echo "selected";
                                                } ?>>A-Z</option>
                            <option value="z-a" <?php if (isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "z-a") {
                                                    echo "selected";
                                                } ?>>Z-A</option>
                        </select>
                        <!-- sort button -->
                        <button class="btn btn-primary" name="submit" type="submit"><i class="fa fa-sort"></i></button>
                    </form>
                </div>

                <!-- search button -->
                <form method="get" class="form-inline my-lg-0 d-flex ml-1">
                    <input class="form-control rounded-start" type="text" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary my-sm-0 rounded-end" type="submit"><i class="fa fa-search"></i></button>
                </form>

                <!-- book dropdown -->
                <?php
                if (isset($_SESSION['user_data'])) {
                    $data = $_SESSION['user_data'];
                    $role = $data['0'];
                    if ($role == 'admin' || $role == 'superadmin') { ?>
                        <li>
                            <div class="dropdown ml-1">
                                <button class="btn btn-dark btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">Book</button>
                                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end text-center text-capitalize">

                                    <!-- add book button -->
                                    <li> <a href="add-book.php" class="dropdown-item">Add Book</a></li>

                                    <!-- all book button -->
                                    <li><a href="allbooks.php" class="dropdown-item">Book list</a></li>

                                </ul>
                            </div>
                        </li>
                <?php }
                } ?>

                <!-- user menu dropdown -->
                <li>
                    <div class="dropdown m-1">
                        <button class="btn btn-dark btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><i class="fa fa-user"></i></button>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end text-center">

                            <!--user profile button -->
                            <li><a href="profile.php" class="dropdown-item">Profile</a></li>

                            <?php
                            if (isset($_SESSION['user_data'])) {
                                $data = $_SESSION['user_data'];
                                $role = $data['0'];
                                if ($role == 'admin' || $role == 'superadmin') { ?>
                                    <!-- all admins button -->
                                    <li><a href="alladmins.php" class="dropdown-item">Admin Detail</a></li>

                                    <?php if (isset($_SESSION['user_data'])) {
                                        $data = $_SESSION['user_data'];
                                        $role = $data['0'];
                                        if ($role == 'superadmin') {
                                    ?>
                                            <!-- add new admin button -->
                                            <li><a href="register.php" class="dropdown-item">Add new Admin</a></li>
                                    <?php
                                        }
                                    } ?>
                                    <!-- admin logout button -->
                                    <li><a href="sessionOUT.php" class="dropdown-item text-danger"><i class="fa fa-sign-out text-danger"></i> Log Out</a></li>

                                <?php } else { ?>
                                    <!--user logout button -->
                                    <li><a href="sessionOUT.php" class="dropdown-item text-danger"><i class="fa fa-sign-out text-danger"></i> Log Out</a></li>
                                    <!-- <li><a href="test.php" class="m-1 btn btn-danger" role="button">verify</a></li> -->
                            <?php
                                }
                            } ?>
                        </ul>
                    </div>
                </li>
        </div>
</nav>

<div class="text-center bg-light">
    <small class="fw-bold">Welcome -
        <?php $data = $_SESSION['user_data'];
        echo $role = $data['3'] . '&nbsp;';
        echo  '[' . $role = $data['0'] . ']'; ?>
    </small>
</div>

<!-- /tagline -->
<?php include 'partials/tagline.php'; ?>

<?php
include 'connection.php';

// pagination
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $current_page = $_GET['page'];
} else {
    $current_page = 1;
}
$items_per_page = 10;
$offset = ($current_page - 1) * $items_per_page;

// search 
$search = isset($_GET['search']) ? $_GET['search'] : '';
$search_query = "SELECT * FROM bookdetail WHERE bookname LIKE '%$search%' OR authorname LIKE '%$search%' LIMIT $items_per_page OFFSET $offset";

// Sorting
$sort_option = "";
if (isset($_GET['sort_alphabet'])) {
    if ($_GET['sort_alphabet'] == "a-z") {
        $sort_option = "ASC";
    } elseif ($_GET['sort_alphabet'] == "z-a") {
        $sort_option = "DESC";
    }
}
$sort_query = "SELECT * FROM bookdetail ORDER BY bookname $sort_option LIMIT $items_per_page OFFSET $offset";

// get record for current page
$query = $search ? $search_query : $sort_query;
// $query .= " LIMIT $offset, $limit";
$results = mysqli_query($con, $query);
?>

<!-- main -->
<!-- <form action="" enctype="multipart/form-data" method="post"> -->
<div class="container d-flex">
    <?php
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_array($results)) {
    ?>
            <div class="card rounded-0" style="max-width:221px">
                <img class="indeximg" src="uploadimg/<?= $row['uploadimgDB']; ?>" style="width:300px">
                <div class="card-body d-flex flex-column p-0 mt-2">
                    <label class="text-danger text-capitalize">book name :</label>
                    <h6 class="text-capitalize"><?= $row['bookname']; ?></h6>

                    <label class="text-danger text-capitalize ">author name :</label>
                    <h6 class="text-capitalize"><?= $row['authorname']; ?></h6>
                </div>
                <hr class="my-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <!-- wishlist card-button -->
                        <a class="btn text-light align-self-start px-1 py-0 bg-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="wish to read" name="wish" href="wishlist.php?wish_id=<?= $row['id']; ?>"><i class="fa fa-heart"></i></a>

                        <!-- readed card button -->
                        <a class="btn text-light align-self-start px-1 py-0 bg-success" data-bs-toggle="tooltip" data-bs-placement="top" title="readed" name="read" href="wishlist.php?readed_id=<?= $row['id']; ?>"><i class="fa fa-check"></i></a>

                        <?php
                        $id_book = $row['id'];
                        $query = "SELECT available_book FROM bookdetail WHERE id = '$id_book' ";
                        $result = mysqli_query($con, $query);
                        $record = mysqli_fetch_assoc($result);
                        // print_r($record);
                        $book_data = array($record['available_book']);
                        $_SESSION['book_data'] = $book_data;
                        $available_book = $record['available_book'];
                        // print_r($available_book);
                        if ($available_book == 0) {
                        ?>
                            <!-- disabled issued card button -->
                            <a class="btn text-light align-self-start px-1 py-0 bg-secondary disabled position-relative" aria-disabled="true" data-bs-toggle="tooltip" data-bs-placement="top" title="not available yet" name="issued" type="button" href="issue-book.php?id=<?= $row['id']; ?>"><i class="fa fa-book"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo $available_book; ?></span></a>
                        <?php
                        } else {
                        ?>
                            <!--enabled issued card button -->
                            <a class="btn text-light align-self-start px-1 py-0 bg-info position-relative" data-bs-toggle="tooltip" data-bs-placement="top" title="issue this book" name="issued" type="button" href="issue-book.php?id=<?= $row['id']; ?>"><i class="fa fa-book"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark"><?php echo $available_book; ?></span></a>
                        <?php
                        }
                        ?>
                    </div>

                    <!-- detail button -->
                    <a class="btn text-dark mt-auto align-self-end fw-bold px-1 py-0 text-decoration-none" type="button" style="background-color: wheat;" href="read_more.php?id=<?= $row['id']; ?>">detail <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <h3>Add Book first... click here <a href="add-book.php"></a></h3>
    <?php
    }
    ?>
</div>
<!-- </form> -->



<?php

$total_items_query = "SELECT COUNT(*) as total FROM bookdetail WHERE bookname LIKE '%$search%' OR authorname LIKE '%$search%'";
$total_items_result = mysqli_query($con, $total_items_query);
$total_items = mysqli_fetch_assoc($total_items_result)['total'];
$total_pages = ceil($total_items / $items_per_page);


// Previous and forward buttons
$prev_page = $current_page - 1;
$next_page = $current_page + 1;
echo "<div class='pagination'>";

// Show all pages
echo "<div class='page-numbers'>";
for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $current_page) {
        echo "<span class='current'>$i</span>";
    } else {
        echo "<a href='main-page.php?page=$i'>$i</a>";
    }
}
echo "</div>";
echo "</div>";

?>

<!-- footer -->
<footer class="bg-dark text-center fixed">
    <div class="container text-white p-1">
        <small>&copy; E-Library 2023. Made in <a href="https://coloredcow.com/"><img style="width:16px" class="mb-1" src="ColoredCow-logo-white.png" alt="logo"></a> ColoredCow Tehri. </small>
    </div>
</footer>

<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>



</body>

</html>
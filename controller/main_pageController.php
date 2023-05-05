<?php
include '../config/connection.php';

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
        while ($row = mysqli_fetch_array($results)) { ?>
            <div class="card rounded-0" style="max-width:221px">
                <img class="indeximg" src="../uploadimg/<?= $row['uploadimgDB']; ?>" style="width:300px">
                <div class="card-body d-flex flex-column p-0 mt-2">
                    <label class="text-danger text-capitalize">book name :</label>
                    <h6 class="text-capitalize"><?= $row['bookname']; ?></h6>
                    <h6 class="text-capitalize" hidden><?= $row['id']; ?></h6>

                    <label class="text-danger text-capitalize ">author name :</label>
                    <h6 class="text-capitalize"><?= $row['authorname']; ?></h6>
                </div>
                <hr class="my-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <!-- wishlist card-button -->
                        <a class="btn text-light align-self-start px-1 py-0 bg-light svg-shadow shadow-gray shadow-intensity-lg" data-bs-toggle="tooltip" data-bs-placement="top" title="wish to read" name="wish" id="success" href="../wishlist.php?wish_id=<?= $row['id']; ?>"><i class="fa fa-heart stroke-transparent"></i></a>
                       
                        <!-- readed card button -->
                        <a class="btn text-light align-self-start px-1 py-0 bg-light svg-shadow shadow-gray shadow-intensity-lg" data-bs-toggle="tooltip" data-bs-placement="top" title="readed" name="read" href="../wishlist.php?readed_id=<?= $row['id']; ?>"><i class="fa fa-check stroke-transparent"></i></a>

                        <?php
                        $id_book = $row['id'];
                        $query = "SELECT available_book FROM bookdetail WHERE id = '$id_book' ";
                        $result = mysqli_query($con, $query);
                        $record = mysqli_fetch_assoc($result);

                        $book_data = array($record['available_book']);
                        $_SESSION['book_data'] = $book_data;
                        $available_book = $record['available_book'];

                        if ($available_book == 0) { ?>
                            <!-- disabled issued card button -->
                            <a class="btn text-light align-self-start px-1 py-0 bg-light svg-shadow shadow-gray shadow-intensity-lg disabled position-relative" aria-disabled="true" data-bs-toggle="tooltip" data-bs-placement="top" title="not available yet" name="issued" type="button" href="../view/issue_book.view.php?id=<?= $row['id']; ?>"><i class="fa fa-book text-secondary"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo $available_book; ?></span></a>
                        <?php
                        } else { ?>
                            <!--enabled issued card button -->
                            <a class="btn text-light align-self-start px-1 py-0 bg-light svg-shadow shadow-gray shadow-intensity-lg position-relative" data-bs-toggle="tooltip" data-bs-placement="top" title="issue this book" name="issued" type="button" href="../view/issue_book.view.php?id=<?= $row['id']; ?>"><i class="fa fa-book text-info"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark"><?php echo $available_book; ?></span></a>
                        <?php } ?>
                    </div>

                    <!-- detail button -->
                    <a class="btn text-dark mt-auto align-self-end fw-bold px-1 py-0 text-decoration-none" type="button" style="background-color: wheat;" href="../read_more.php?id=<?= $row['id']; ?>">detail <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        <?php
        }
    } else { ?>
        <h3>Add Book first... click here <a href="../view/add_book.view.php"></a></h3>
    <?php } ?>
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
        echo "<a href='../view/main_page.view.php?page=$i'>$i</a>";
    }
}
echo "</div>";
echo "</div>";

?>
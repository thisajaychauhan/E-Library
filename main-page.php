<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>mainpage</title>
</head>

<body>
    <!-- navbar -->

    <nav>
        <p><a href="main-page.php">E-library</a></p>

        <div class="rightnav">
            <!-- sorting button -->
            <form action="" method="get">
                <select name="sort_alphabet">
                    <option value="">sort as</option>
                    <option value="a-z" <?php if (isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "a-z") {
                                            echo "selected";
                                        } ?>>A-Z</option>
                    <option value="z-a" <?php if (isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "z-a") {
                                            echo "selected";
                                        } ?>>Z-A</option>
                </select>
                <button class="sortbtn" name="submit" type="submit">sort</button>
            </form>

            <!-- search button -->
            <form class="example" method="get">
                <input type="text" name="search">
                <button class="searchbtn" type="submit">search</button>
            </form>

            <!-- add book button -->
            <button class="addbtn"><a href="add-book.php">Add A Book</a></button>
            <button class="logoutbtn"><a href="logout.php">Logout</a></button>
        </div>
    </nav>

    <!-- tagline -->

    <section>
        <p>Read and grow</p>
    </section>
    <!-- ========================================================================= -->
    <?php
    include 'connection.php';

    // pagination
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $current_page = $_GET['page'];
    } else {
        $current_page = 1;
    }
    $items_per_page = 8;
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
    <div class="card-container">
        <?php
        if (mysqli_num_rows($results) > 0) {
            while ($row = mysqli_fetch_array($results)) {
        ?>
                <div class="card">
                    <div class="box">
                        <img class="indeximg" src="uploadimg/<?= $row['uploadimgDB']; ?>">
                        <div class="detail">
                            <div class="info">
                                <label for="">book name</label>
                                <h4><?= $row['bookname']; ?></h4>

                                <label for="">author name</label>
                                <h4><?= $row['authorname']; ?></h4>

                                <!-- <label for="">description</label>
                                <h4><?= $row['description']; ?></h4> -->

                                <div class="info">
                                    <a style="background-color: wheat;" href="readmore.php?id=<?= $row['id']; ?>">read more <i class="fa fa right-angle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        } else {
            ?>
            <h3>Empty Library..!!!! Add Book Please</h3>
        <?php
        }
        ?>
    </div>





    <?php

    $total_items_query = "SELECT COUNT(*) as total FROM bookdetail WHERE bookname LIKE '%$search%' OR authorname LIKE '%$search%'";
    $total_items_result = mysqli_query($con, $total_items_query);
    $total_items = mysqli_fetch_assoc($total_items_result)['total'];
    $total_pages = ceil($total_items / $items_per_page);


    // Previous and forward buttons
    $prev_page = $current_page - 1;
    $next_page = $current_page + 1;
    echo "<div class='pagination'>";
    if ($current_page > 1) {
        echo "<a href='main-page.php?page=$prev_page' class='prev-btn'>&laquo; </a>";
    }

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
    if ($current_page < $total_pages) {
        echo "<a href='main-page.php?page=$next_page' class='next-btn'> &raquo;</a>";
    }
    echo "</div>";

    ?>


    <?php include 'footer.php' ?>
</body>

</html>
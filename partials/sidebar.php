<div class="offcanvas offcanvas-start w-50vh" tabindex="-1" id="offcanvas" data-bs-keyboard="false" data-bs-backdrop="false">
    <div class="offcanvas-header">
        <h6 class="offcanvas-title d-none d-sm-block text center fs-3" id="offcanvas">Reading History</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <?php
    include 'connection.php';

    // get email from session
    $data = $_SESSION['user_data'];
    $email = $data['1'];

    $search_query = "SELECT * FROM book_readed WHERE email = '$email' ";
    $result = mysqli_query($con, $search_query);
    $count = mysqli_num_rows($result); ?>
    <h6 class="mx-4 my-1 text-danger text-capitalize">total book readed = <?php echo $count ?></h6>

    <?php
    include 'connection.php';
    for ($i = 1; $i <= 12; $i++) {
        // get month name and year
        $month_name = date('F', mktime(0, 0, 0, $i, 1));
        $year = date('Y');

        // set collapse ID and aria-labelledby attributes
        $collapse_id = 'collapse' . $i;
        $parent_id = 'accordionFlushExample';

        // retrieve book data for the current month
        include 'connection.php';
        $search_query = "SELECT * FROM book_readed WHERE email = '$email' AND MONTH(readed_date) = $i";
        $result = mysqli_query($con, $search_query);
    ?>
        <div class="accordion accordion-flush" id="accordionFlushExample">

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse_id; ?>" aria-expanded="true" aria-controls="<?php echo $collapse_id; ?>">
                        <?php echo $month_name . ' ' . $year; ?> &nbsp;<span class="badge bg-dark"><?php echo mysqli_num_rows($result); ?></span>
                    </button>
                </h2>
                <div id="<?php echo $collapse_id; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo $heading_id; ?>" data-bs-parent="#<?php echo $parent_id; ?>">
                    <div class="accordion-body">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            // iterate through the rows and display the book names
                            $a = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <small class="fw-bold"><?= $a ?></small>
                                <small class="fw-medium"><?= $row['bookname'] ?></small>
                                <div><small><?= $row['readed_date'] ?></small></div>
                        <?php
                                $a++;
                            }
                        } else {
                            // display a message if there are no books for this month
                            echo "<p>No books read this month</p>";
                        }
                        mysqli_free_result($result);
                        mysqli_close($con);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    </ul>
</div>
</div>
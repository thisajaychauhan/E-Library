<!-- <?php include 'sessionIN.php' ?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainpage.css" type="text/css">

    <!-- bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->


    <!-- font awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

</head>
<title>E-library</title>
</head>

<body>


    <!-- navbar -->

    <nav>
        <p><a href="">E-library</a></p>
        <div>
            <button class="btn"> <a href="add-book.php"> Add a Book</a></button>
            <button class="btn"> <a href="/session/sessionLOGOUT.php"> Logout</a></button>
        </div>
    </nav>



    <!-- tagline -->

    <section>
        <!-- <h3>Welcome <?= $row['email']; ?></h3> -->
        <p>Read and grow</p>
    </section>



    <?php
    include 'connection.php';

    $query = "SELECT * FROM bookdetail";
    $query_run = mysqli_query($con, $query);
    $result = mysqli_num_rows($query_run);
    if (($result) > 0) {
        foreach ($query_run as $row) {
    ?>
            <!-- main -->
            <div class="flexbox">
                <div class="box">
                    <div class="detail">
                        <div class="image">
                            <img class="indeximg" src="uploadimg/<?= $row['uploadimgDB']; ?>">
                        </div>
                        <div class="info">
                            <label>Book Name</label>
                            <h4><?= $row['bookname']; ?></h4>
                            <label>Author Name</label>
                            <h4><?= $row['authorname']; ?></h4>
                            <label>Description</label>
                            <h4><?= $row['description']; ?></h4>
                            <div class="indexbtn">
                                <a href="read-more/read-HP.php">read more<i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    } else { ?>
        <h3>no record found</h3>
    <?php } ?>


    <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#">&raquo;</a>
    </div>




    <!-- footer -->

    <footer>
        <p>&copy; E-Library 2023</p>
    </footer>

    <!-- bootstrap js -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->

</body>

</html>
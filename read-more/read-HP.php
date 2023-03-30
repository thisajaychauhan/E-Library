<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="read-style.css" type="text/css">

    <!-- bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->

</head>
<title>E-library</title>
</head>

<body>

    <!-- navbar -->

    <nav>
        <p><a href="index.html">E-library</a></p>
        <div>
            <button class="btn"> <a href="add-book.html"> Edit Details</a></button>
            <button class="btn"> <a href="index.html"> Delete Book</a></button>
        </div>
    </nav>


    <!-- tagline -->

    <section>
        <p>Read and grow</p>
    </section>
<?php
include 'connection.php';

$query = "SELECT * FROM e-library";
$result = mysqli_query($con, $query);

while(mysqli_fetch_array($result)){

?>


    <!-- main -->

    <div class="rmcontainer">
        <div class="rmcover">
            <div class="rmbook">
                <div class="bookimg">
                    <img class="rmimg" src="upload/<?php echo $row['upload'];?>" alt="">
                </div>
            </div>

            <div class="rmdetail">
                <div class="bookdetail">
                    <label for="">Book Name</label>
                    <h3><?php echo $row['bookname']; ?></h3>
                    <label for="">Author Name</label>
                    <h3><?php echo $row['authorname'] ?></h3>
                    <label for="">Description</label>
                    <h3><?php echo $row['description'] ?></h3>
                    <h3></h3>
                </div>
            </div>
        </div>

    </div>


    <?php 
}
?>
    <!-- footer -->

    <footer>
        <p>&copy; E-Library 2023</p>
    </footer>
    </div>
    </section>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>
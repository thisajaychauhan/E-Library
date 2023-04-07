<?php
session_start();
if (!isset($_SESSION['email']))
    header('location:login.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>E-Library</title>
</head>

<body>


    <!-- navbar -->

    <nav>
        <div>
            <p><a href="main-page.php">E-library</a></p>
        </div>

        <div style="display: flex;">
            <!-- edit button -->
            <a href="edit-book.php?id=<?= $_GET['id']; ?>"> <input class="editbtn" type="submit" value="edit"></a>

            <!-- delete button -->
            <a href="deletebook.php?id=<?= $_GET['id']; ?>"><input class="deletebtn" type="submit" value="delete"></a>
        </div>
    </nav>



    <!-- tagline -->

    <section>
        <p>Read and grow</p>
    </section>

    <form action="" method="post">
        <?php
        include 'connection.php';
        $new_id = isset($_GET['id']) ? $_GET['id'] : '';

        $query = "SELECT * FROM bookdetail WHERE id = '$new_id' ";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        if ($row) {
        ?>
            <div class="rmcontainer">
                <div class="rmcover">
                    <div class="rmdetail">
                        <div class="rmimg">
                            <img src="uploadimg/<?php echo $row['uploadimgDB']; ?>" style="width:200px; height:280px;">
                        </div>
                        <div class="bookdetail">
                            <h3><?php echo $row['id']; ?></h3>

                            <label for="">book name</label>
                            <h3><?php echo $row['bookname']; ?></h3>

                            <label for="">author name</label>
                            <h3><?php echo $row['authorname']; ?></h3>

                            <label for="">description</label>
                            <h3><?php echo $row['description']; ?></h3>
                        </div>
                    </div>
                </div>

            </div>
        <?php
        }
        ?>
    </form>
    <?php include 'footer.php' ?>
</body>

</html>
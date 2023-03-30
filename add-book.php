<?php
include 'connection.php';

if (isset($_POST['submit'])) {

    $bookname = $_POST['bookname'];
    $authorname = $_POST['authorname'];
    $description = $_POST['description'];

    $imgname = $_FILES['upload']['name'];
    $tempname = $_FILES['upload']['tmp_name'];
    move_uploaded_file($tempname, 'uploadimg/' . $imgname);

    $save_bookdetail = "INSERT INTO bookdetail (bookname,authorname,description,uploadimgDB)
    VALUES('$bookname','$authorname','$description','$imgname')";
    $result = mysqli_query($con, $save_bookdetail);

    if ($result) {
?><script>
            alert('book added successfully');
        </script><?php
                    header("location:mainpage.php");
                } else {
                    ?><script>
            alert('try again');
        </script><?php
                    header("location:add-book.php");
                }
            }

                    ?>


<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
</head>

<body> -->

<!-- edit button -->
<!-- <button><a href="edit.php?editid=<?php echo $result['id']; ?>">edit</a></button> -->

<!-- delete button -->
<!-- <button><a href="delete.php?delid=<?php echo $result['id']; ?>">delete</a></button> -->



<!-- <form action="" enctype="multipart/form-data" method="post" style="display: flex; flex-direction:column;margin: 20px;">

        <label for="">book name</label>
        <input type="text" name="bookname" required>

        <label for="">author name</label>
        <input type="text" name="authorname" required>

        <label for="">description</label>
        <textarea name="description" cols="30" rows="10" required></textarea>

        <input type="file" name="upload" required>

        <button name="submit" type="submit">save</button>
    </form>
</body>

</html>  -->





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainpage.css">

    <!-- bootstrap  -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->

    <!-- font awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

</head>
<title>E-library</title>
</head>

<body>

    <!-- navbar -->

    <nav>
        <p><a href="">E-library</a></p>
        <button class="btn"><a href="mainpage.php">back to list</a></button>
    </nav>



    <!-- tagline -->

    <section>
        <p>Read and grow</p>
    </section>


    <!-- main -->

    <div class="container-add">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="flexadd">
                <div class="inner">
                    <label for="">book name</label>
                    <input type="text" name="bookname">
                    <label for="">author name</label>
                    <input type="text" name="authorname">
                    <label for="">description</label>
                    <textarea name="description" cols="30" rows="10"></textarea>
                </div>


                <div class="addbookimg">
                    <div class="inneraddbook">
                        <div class="uploadimage">
                            <input class="upload-input" type="file" name="upload"></input>
                        </div>
                        <div class="adbutton">
                            <button class="addbook-btn" name="submit">save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <!-- footer -->

    <footer>
        <p>&copy; E-Library 2023</p>
    </footer>
    </div>
    </section>

    <!-- bootstrap js -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
    <!-- </body>
    
</html> -->
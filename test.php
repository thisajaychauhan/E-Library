<!-- html header -->
<?php include 'partials/html-header.php'; ?>

<!-- navbar -->
<?php include 'partials/navbar.php'; ?>

<!-- /tagline -->
<?php include 'partials/tagline.php'; ?>




<!-- <div class="d-flex text-center">
  <div class="row align-items-center">
    <div class="card">
      <form class="form-login">
        <h1 class="h3 mb-3 font-weight-normal">Login</h1> -->
<!-- 'sr-only' will hide the text : 'Email Address'. So, 'Email Address' will be invisible -->
<!-- <label for="inputEmail" class="sr-only">Email Address</label> -->
<!-- 'autofocus' will highlight the input column initially -->
<!-- <input type="email" id="inputEmail" class="form-control mb-2" placeholder="Email Address" required autofocus> -->
<!-- 'sr-only' will hide the text : 'Password'. So, 'Password' will be invisible -->
<!-- <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Password" required> -->
<!-- 'btn-block' will make the button wider -->
<!-- <button class="btn btn-lg btn-primary btn-block" type="submit">
          Login
        </button>
      </form>
    </div>
  </div>
</div> -->


<section class="h-100">
  <div class="container h-100">
    <div class="row justify-content-sm-center h-100">
      <div class="col-lg-5 col-md-7 col-sm-9">
        <div class="card">
          <div class="card-body p-5">
            <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
            <form method="POST">
              <div class="mb-3">
                <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
              </div>

              <div class="mb-3">
                <div class="mb-2 w-100">
                  <label class="text-muted" for="password">Password</label>
                  <a href="forgot.html" class="float-end">
                    Forgot Password?
                  </a>
                </div>
                <input id="password" type="password" class="form-control" name="password" required>
              </div>

              <div class="d-flex align-items-center">
                <button type="submit" class="btn btn-primary ms-auto">Login</button>
              </div>
            </form>
          </div>
          <div class="card-footer py-3 border-0">
            <div class="text-center">
              Don't have an account? <a href="register.html" class="text-dark">Create One</a>
            </div>
          </div>
        </div>
        <div class="text-center mt-5 text-muted">
          Copyright &copy; 2017-2021 &mdash; Your Company
        </div>
      </div>
    </div>
  </div>
</section>


<div class="container d-flex justify-content-center mt-5 pt-5">
  <div class="card mt-5" style="width:500px">
    <div class="card-header">
      <h1 class="text-center">Creat New Password</h1>
    </div>
    <div class="card-body">
      <form method="post">
        <div class="mt-2">
          <label for="Password">Password : </label>
          <input type="password" name="Password" class="form-control" placeholder="Creat New Password">
          <input type="hidden" name="email" class="form-control" value=' . $email . '>
        </div>
        <div class="mt-4 text-end">
          <input type="submit" name="update" value="update" class="btn btn-primary">
          <a href="index.php" class="btn btn-danger">Back</a>
        </div>
      </form>
    </div>
  </div>
</div>




<!-- <section>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Password Expired</div>

            <form class="form-horizontal" method="POST" action="">

              <div class="form-group">
                <label for="new-password" class="col-md-4 control-label">Current Password</label>

                <div class="col-md-6">
                  <input id="current-password" type="password" class="form-control" name="current-password" required>
                </div>
              </div>

              <div class="form-group">
                <label for="new-password" class="col-md-4 control-label">New Password</label>

                <div class="col-md-6">
                  <input id="new-password" type="password" class="form-control" name="new-password" required>
                </div>
              </div>

              <div class="form-group">
                <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>

                <div class="col-md-6">
                  <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    Change Password
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
<!-- 
<?php
session_start();
require('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How to Forgot Password send Mail in PHP?</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="container-fluid mt-3">
        <div class="card" style="height:590px;">
            <div class="card-header text-center">
                <h3>How to Forgot Password send Mail in PHP? - Nicesnippets.com</h3>
            </div>
            <div class="card-body">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand " href="#">Aatmaninfo</a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">about us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">contect us</a>
                            </li>
                        </ul>
                    </div>
                    <form class="justify-content-end">
                        <?php
                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE) {
                          echo $_SESSION['email'] . " - <a href='logout.php' class='btn btn-danger'>LOGOUT</a>";
                        } else {
                          echo "<button type='button' class='btn btn-success m-1' data-bs-toggle  ='modal' data-bs-target='#loginModal'>Login</button>
                                <button type='button' class='btn btn-danger m-1' data-bs-toggle='modal' data-bs-target='#RegisterModal'>Register</button>";
                        }
                        ?>
                    </form>
                </nav>
                    <?php
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE) {
                      echo "<h1 class='text-center mt-5 pt-5'>Welcom to this website</h1>";
                    }
                    ?>
            </div>
        </div>
        
        <div class="modal fade" id="loginModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="loginModalLabel">Login</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="registration.php" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Email : </label>
                                <input type="text" name="email_username" class="form-control" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label>Password : </label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="text-end">
                                <a href="forgotPassword.php" class='btn m-1 text-primary' style="background:transparent;">Forgot Password ?</a>
                            </div>
                            <hr class="mt-0">
                            <div class="text-center">
                                <input type="submit" name="login" value="Login" class="btn btn-primary">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        
        <div class="modal fade" id="RegisterModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="RegisterModalLabel">Register</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="registration.php" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Full Name : </label>
                                <input type="text" name="fullName" class="form-control" placeholder="Full Name">
                            </div>

                            <div class="mb-3">
                                <label>User Name : </label>
                                <input type="text" name="username" class="form-control" placeholder="User Name">
                            </div>

                            <div class="mb-3">
                                <label>Email : </label>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>

                            <div class="mb-3">
                                <label>Password : </label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="register" value="Register" class="btn btn-primary">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html> -->

<!-- <style>
  .form-login {
    width: 100%;
    max-width: 330px;
    padding: 15px;
    margin: auto;
  }
</style> -->

<!-- Optional JavaScript -->
<!-- Popper.js first, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>

<!--======forgotpassword====== -->

<div class="container p-3 border border-5 rounded-3" style="width: 40%">
  <h1 class="display-6 text-center p-2 bg-light">
    Change Password
  </h1>
  <form action="" method="post">
    <div class="row mb-3 justify-content-md-center">
      <label for="inputEmail" class="col-4 col-form-label">Email</label>
      <div class="col-lg-auto">
        <input type="email" name="email" id="inputEmail" class="form-control" required>
      </div>
    </div>
    <div class="row mb-3 justify-content-md-center">
      <label for="inputPassword" class="col-4 col-form-label">New Password</label>
      <div class="col-lg-auto">
        <input type="password" name="new_password" id="inputPassword" class="form-control" required>
      </div>
    </div>
    <div class="row mb-3 justify-content-md-center">
      <div class="col-8">
        <button type="submit" class="btn btn-primary" name="change">Change</button>
      </div>
    </div>
  </form>
</div>

<!-- ========atomic habit=========== -->

In Atomic Habits, James Clear argues that big goals shouldn’t be your main focus in life. Instead, you should be utilizing frequent, repetitive actions and systems to help develop habits that stick.

The significant changes you want to make in your life depend more on creating small habits than sizable shifts. For example, suppose you want to get in shape. In that case, your best bet is eating slightly better, exercising regularly, and getting enough sleep. Instead of wasting your time setting unachievable goals with drastic changes, all you have to do is make one minor change daily. This theme runs throughout Atomic Habits. The quality of your life depends on the quality of your habits. Some habits are small like an atom. As these atomic habits accumulate, they can make a significant impact in your life.

<div class="container justify-content-center">
  <div class="card form-control">
    <div class="row g-0">
      <div class="col-md-6">
        <img src="uploadimg/<?php echo $row['uploadimgDB']; ?>" class="img-fluid rounded-start" alt="Book image">
      </div>
      <div class="col-md-6">
        <div class="card-body">
          <div class="d-flex flex-row">
            <h5 class="card-title text-danger ">Book name: </h5>
            <h5 class="card-text text-capitalize"><?php echo $row['bookname']; ?></h5>
          </div>
          <div class="d-flex flex-row">
            <h5 class="card-title text-danger">Author name: </h5>
            <h5 class="card-text text-capitalize"><?php echo $row['authorname']; ?></h5>
          </div>
          <div class="">
            <h5 class="card-title text-danger">Description: </h5>
            <h5 class="card-text"><?php echo $row['description']; ?></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /editpage -->

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card p-4">
        <div class="d-flex justify-content-center flex-wrap mb-4">
          <div class="d-flex flex-column align-items-center me-4">
            <label class="fw-bold mb-2">Old Image</label>
            <div>
              <img src="uploadimg/<?php echo $single_row['uploadimgDB'] ?>" alt="" class="img-fluid" style="max-width: 200px; max-height: 300px;">
            </div>
            <input type="hidden" name="oldimg" value="<?php echo $single_row['uploadimgDB'] ?>">
          </div>
          <div class="d-flex flex-column">
            <div class="mb-3">
              <label for="upload" class="form-label fw-bold">Choose New Image</label>
              <input type="file" name="upload" class="form-control" id="upload">
            </div>
            <div class="mb-3">
              <label for="bookname" class="form-label fw-bold">Book Name</label>
              <input type="text" name="bookname" class="form-control" id="bookname" value="<?= $single_row['bookname']; ?>">
            </div>
            <div class="mb-3">
              <label for="authorname" class="form-label fw-bold">Author Name</label>
              <input type="text" name="authorname" class="form-control" id="authorname" value="<?= $single_row['authorname']; ?>">
            </div>
            <div class="mb-3">
              <label for="description" class="form-label fw-bold">Description</label>
              <textarea name="description" class="form-control" id="description"><?= $single_row['description']; ?></textarea>
            </div>
            <div class="">
              <button type="submit" name="submit" class="btn btn-primary col-12">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- tab pills -->
<?php include 'partials/html-header.php'; ?>

<div id="exTab1" class="container">
  <ul class="nav nav-pills">
    <li class="active">
      <a href="#1a" data-toggle="tab">Overview</a>
    </li>
    <li><a href="#2a" data-toggle="tab">Using nav-pills</a>
    </li>
    <li><a href="#3a" data-toggle="tab">Applying clearfix</a>
    </li>
    <li><a href="#4a" data-toggle="tab">Background color</a>
    </li>
  </ul>

  <div class="tab-content clearfix">
    <div class="tab-pane active" id="1a">
      <h3>Content's background color is the same for the tab</h3>
    </div>
    <div class="tab-pane" id="2a">
      <h3>We use the class nav-pills instead of nav-tabs which automatically creates a background color for the tab</h3>
    </div>
    <div class="tab-pane" id="3a">
      <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
    </div>
    <div class="tab-pane" id="4a">
      <h3>We use css to change the background color of the content to be equal to the tab</h3>
    </div>
  </div>
</div>



<style>
  body {
    padding: 10px;

  }

  #exTab1 .tab-content {
    color: white;
    background-color: #428bca;
    padding: 5px 15px;
  }

  #exTab2 h3 {
    color: white;
    background-color: #428bca;
    padding: 5px 15px;
  }

  /* remove border radius for the tab */

  #exTab1 .nav-pills>li>a {
    border-radius: 0;
  }

  /* change border radius for the tab , apply corners on top*/

  #exTab3 .nav-pills>li>a {
    border-radius: 4px 4px 0 0;
  }

  #exTab3 .tab-content {
    color: white;
    background-color: #428bca;
    padding: 5px 15px;
  }
</style>

<?php include 'partials/footer.php'; ?>
<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>

</html>



<!-- all admin  -->

<?php
include 'connection.php';

$alladmin_query = "SELECT * FROM registration ";
$result = mysqli_query($con, $alladmin_query);
if ($row = mysqli_num_rows($result)) {
?>
  <div class="container-fluid">
    <table class="table table-bordered table-hover table-sm text-center">
      <tr class="table-dark text-capitalize">
        <th>id</th>
        <th>role</th>
        <th>username</th>
        <th>e-mail</th>
        <th>verify status</th>
        <th>update</th>
        <th>delete</th>
      </tr>
      <tr>
        <?php
        while ($row = mysqli_fetch_array($result)) {
        ?>
          <th class="fw-normal"><?= $row['id']; ?></th>
          <th class="fw-normal"><?= $row['role']; ?></th>
          <th class="fw-normal"><?= $row['username']; ?></th>
          <th class="fw-normal"><?= $row['email']; ?></th>
          <th class="fw-normal"><?= $row['verify_status']; ?></th>
          <th><a href="edit-book.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a></th>
          <th><a href="deletebook.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash text-danger"></i></a></th>

          <!-- <th><img class="indeximg" src="uploadimg/<?= $row['uploadimgDB']; ?>" style="width: 30px; height:50px;"></th> -->
      </tr>
  <?php
        }
      }
  ?>
    </table>
  </div>

  <!-- new tab pills -->


  <div class="container mt-5">
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
          <i class="now-ui-icons objects_umbrella-13"></i> Home
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
          <i class="now-ui-icons shopping_cart-simple"></i> Profile
        </a>
      </li>
    </ul>

    <div class="tab-content text-center">
      <div class="tab-pane active" id="home" role="tabpanel">
        <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
      </div>
      <div class="tab-pane" id="profile" role="tabpanel">
        <p> I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. </p>
      </div>
    </div>

  </div>
  </div>

  <!-- tab pill active -->
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <!-- Scrollspy -->
    <div id="scrollspy1" class="sticky-top">
      <ul class="nav nav-pills menu-sidebar ps-2">
        <li class="nav-item">
          <a class="nav-link" href="#example-1">Section 1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#example-2">Section 2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#example-3">Section 3</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#example-4">Section 4</a>
        </li>
      </ul>
    </div>
    <!-- Scrollspy -->
  </nav>


  <!-- wish book duplicacy -->


  <?php
  if (isset($_GET['id'])) {
    // Get user data from session
    $data = $_SESSION['user_data'];
    $username = $data['3'];
    $email = $data['1'];

    // Get book data from bookdetail table
    $id_book = $_GET['id'];
    $query = "SELECT bookname,uploadimgDB FROM bookdetail WHERE id = '$id_book'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $bookname = $row['bookname'];
    $bookimage = $row['uploadimgDB'];

    // Check if the book is already in the wishlist
    $duplicacy_query = "SELECT book_id FROM user_book_details WHERE username = '$username' AND book_id = '$id_book'";
    $duplicacy_result = mysqli_query($con, $duplicacy_query);

    if (mysqli_num_rows($duplicacy_result) > 0) {
      // The book is already in the wishlist, so remove it
      $remove_query = "DELETE FROM user_book_details WHERE username = '$username' AND book_id = '$id_book'";
      $remove_result = mysqli_query($con, $remove_query);

      if ($remove_result) {
        echo "<script>alert('Book removed from wishlist')</script>";
      } else {
        echo "<script>alert('Error removing book from wishlist')</script>";
      }
    } else {
      // The book is not in the wishlist, so add it
      $query = "INSERT INTO user_book_details (book_id,username, email, bookname, bookimage) VALUES('$id_book','$username','$email','$bookname','$bookimage')";
      $results = mysqli_query($con, $query);

      if ($results) {
        echo "<script>alert('Book added to wishlist')</script>";
      } else {
        echo "<script>alert('Error adding book to wishlist')</script>";
      }
    }
  }

  ?>


  <!-- book wishlist -->

  <!-- readed book tab -->
  

<!-- instagram like button -->

   <!-- wishlist card-button -->
   <a class="btn text-light align-self-start px-1 py-0 bg-light svg-shadow shadow-gray shadow-intensity-lg" data-bs-toggle="tooltip" data-bs-placement="top" title="wish to read" name="wish" href="wishlist.php?wish_id=<?= $row['id']; ?>">
                            <?php
                            include 'connection.php';
                            $book_query = "SELECT * FROM user_book_details WHERE book_id = '$row[id]' AND email = '$email'";
                            $result = mysqli_query($con, $book_query);

                            if (mysqli_num_rows($result) > 0) { ?>
                                <i class="fa fa-heart text-danger"></i></a>
                    <?php } else { ?>
                        <i class="fa fa-heart stroke-transparent"></i></a>
                    <?php } ?>

                    <!-- readed card button -->

                    <a class="btn text-light align-self-start px-1 py-0 bg-light svg-shadow shadow-gray shadow-intensity-lg" data-bs-toggle="tooltip" data-bs-placement="top" title="readed" name="read" href="wishlist.php?readed_id=<?= $row['id']; ?>">
                        <?php
                        include 'connection.php';
                        $book_query = "SELECT * FROM book_readed WHERE book_id = '$row[id]' AND email = '$email'";
                        $result = mysqli_query($con, $book_query);

                        if (mysqli_num_rows($result) > 0) { ?>
                            <i class="fa fa-check text-success"></i></a>
                <?php } else { ?>
                    <i class="fa fa-check stroke-transparent"></i></a>
                <?php } ?>



                <!-- week wise reading history -->
                <?php
                // retrieve book data for the whole year, grouped by week and year
                include 'connection.php';
                $search_query = "SELECT WEEK(readed_date) AS week_num, 
                DATE_FORMAT(MIN(readed_date), '%M %d') AS start_date, 
                DATE_FORMAT(MAX(readed_date), '%M %d') AS end_date, 
                GROUP_CONCAT(bookname ORDER BY readed_date SEPARATOR ', ') AS books_read
                FROM book_readed 
                WHERE email = '$email' AND YEAR(readed_date) = YEAR(NOW())
                GROUP BY week_num
                ORDER BY week_num DESC";

                $result = mysqli_query($con, $search_query);

                // loop through the weeks and display them
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $week_num = $row['week_num'];
                        $year = $row['year'];
                        $start_date = $row['start_date'];
                        $end_date = $row['end_date'];
                        $books_read = $row['books_read'];
                ?>
                        <div>
                            <p>Week <?php echo $week_num; ?>, <?php echo $year; ?>: <?php echo $start_date; ?> - <?php echo $end_date; ?></p>
                            <p><?php echo $books_read; ?></p>
                        </div>
                <?php
                    }
                } else {
                    // display a message if there are no books for the year
                    echo "<p>No books read this year</p>";
                }
                mysqli_free_result($result);
                mysqli_close($con);
                ?>

                <!-- accordion -->

                <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Accordion Item #1
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.
                                </div>
                            </div>
                        </div>
                    </div>

     



                                    
                                    // weekly 
                                    <div class="accordion-item">
    <?php
    // get weekly book data for the current week
    include 'connection.php';
    $search_query = "SELECT WEEK(readed_date) AS week_num, YEAR(readed_date) AS year,
             DATE_FORMAT(MIN(readed_date), '%M %d') AS start_date,
             DATE_FORMAT(MAX(readed_date), '%M %d') AS end_date,
             GROUP_CONCAT(bookname ORDER BY readed_date SEPARATOR ', ') AS books_read
             FROM book_readed 
             WHERE email = '$email' AND WEEK(readed_date) = $week_num AND YEAR(readed_date) = YEAR(NOW())
             GROUP BY week_num, year
             ORDER BY year DESC";
    $result = mysqli_query($con, $search_query);
    
    // set collapse ID and aria-labelledby attributes
    $collapse_id = 'collapse' . $week_num;
    $parent_id = 'accordionExample';

    if (mysqli_num_rows($result) > 0) {
        // fetch the data for the first row
        $row = mysqli_fetch_assoc($result);
    ?>
        <h2 class="accordion-header" id="heading<?= $week_num ?>">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $collapse_id ?>" aria-expanded="false" aria-controls="<?= $collapse_id ?>">
                Week <?= $week_num ?>: <?= $row['start_date'] ?> - <?= $row['end_date'] ?> &nbsp;<span class="badge bg-dark"><?= mysqli_num_rows($result); ?></span>
            </button>
        </h2>
        <div id="<?= $collapse_id ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $week_num ?>" data-bs-parent="#<?= $parent_id ?>">
            <div class="accordion-body">
                <?php
                // loop through the result set and display the data
                $a = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div>
                        <small class="fw-bold"><?= $a ?>.</small>
                        <small class="fw-bold"><?= date('l, F jS', strtotime($row['readed_date'])) ?></small>
                        <small class="fw-bold"><?= $row['bookname'] ?></small>
                    </div>
                <?php
                    $a++;
                }
                mysqli_free_result($result);
                mysqli_close($con);
                ?>
            </div>
        </div>
    <?php
    } else {
        // display message if no data is found
        ?>
        <h2 class="accordion-header" id="heading<?= $week_num ?>">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $collapse_id ?>" aria-expanded="false" aria-controls="<?= $collapse_id ?>">
                Week <?= $week_num ?>: No books read
            </button>
        </h2>
        <?php
    }
    ?>
</div>


<!-- modal bootstrap -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://sourcecodester.com">Sourcecodester</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - Delete MySQLi Data In Modal</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-4">
			<form method="POST" action="insert.php">	
				<div class="form-group">
					<label>Firstname</label>
					<input type="text" name="firstname" class="form-control" required="required"/>
				</div>
				<div class="form-group">
					<label>Lastname</label>
					<input type="text" name="lastname" class="form-control" required="required" />
				</div>
				<div class="form-group">
					<label>Address</label>
					<input type="text" name="address" class="form-control" required="required"/>
				</div>
			</form>
		</div>
		<div class="col-md-8">	
			<table class="table table-bordered">
				<thead class="alert-info">
					<tr>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Address</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						require 'conn.php';
						$count=0;
						$query = mysqli_query($conn, "SELECT * FROM `member` ORDER BY `lastname` ASC") or die();
						while($fetch = mysqli_fetch_array($query)){
						$count++;
					?>
					<tr class="del_mem<?php echo $fetch['mem_id']?>">
						<td><?php echo $fetch['firstname']?></td>
						<td><?php echo $fetch['lastname']?></td>				
						<td><?php echo $fetch['address']?></td>				
						<td><button type="button" class="btn btn-danger" data-target="#modal_delete<?php echo $count?>" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Delete</button>
			</td>				
					</tr>
 
					<div class="modal fade" id="modal_delete<?php echo $count?>" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h3 class="modal-title">System</h3>
								</div>
								<div class="modal-body">
									
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
									<a type="button" class="btn btn-danger" href="delete.php?mem_id=<?php echo $fetch['mem_id']?>">Yes</a>
								</div>
							</div>
						</div>
					</div>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>	
	</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>	
</html>
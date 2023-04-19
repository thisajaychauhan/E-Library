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
<!-- session IN -->
<?php include '../session/sessionIN.php'; ?>

<!-- html header -->
<?php include '../partials/html-header.php'; ?>



<!-- navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-medium fs-3 text-white" href="#">E-library</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
        <?php if (isset($_SESSION['user_data'])) {
          $data = $_SESSION['user_data'];
          $role = $data['0'];
          if ($role == 'admin' || $role == 'superadmin') {
        ?>
            <div style="display: flex;">
              <!-- edit button -->
              <li> <a href="../view/edit_book.view.php?id=<?= $_GET['id']; ?>" class="btn btn-primary m-1" role="button"><i class="fa fa-edit"></i></a></li>

              <!-- delete button -->
              <li> <a data-bs-toggle="modal" data-bs-target="#modal" class="btn btn-danger mt-1"><i class="fa fa-trash"></i></a></li>

              <?php
              // modal popup
              $link = '../modal/delete_book.php?id=' . $_GET['id'];
              $body = 'Are you sure you want to delete this item ?';
              $heading = 'Delete Item';
              include '../partials/modal_popup.php';
              ?>

              <!-- Back button -->
              <li><a href="./main_page.view.php" class="btn bg-light text-dark fw-bold m-1" role="button" name="submit" type="submit"><i class="fa fa-chevron-left"></i></a></li>
            </div>
          <?php } else { ?>
            <!-- Back button -->
            <a href="./main_page.view.php" class="btn bg-light text-dark fw-bold" role="button" name="submit" type="submit"><i class="fa fa-chevron-left"></i> back</a>
        <?php
          }
        }
        ?>

      </ul>
    </div>
  </div>
</nav>

<!-- tagline -->
<?php include '../partials/tagline.php'; ?>

<form action="" method="post">
  <?php include '../config/connection.php';
  $new_id = isset($_GET['id']) ? $_GET['id'] : '';

  $query = "SELECT * FROM bookdetail WHERE id = '$new_id' ";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_array($result);
  if ($row) {
  ?>
    <div class="container justify-content-center">
      <div class="card">
        <div class="row g-0">
          <div class="col-12 col-sm-12 col-md-12 col-lg-4 p-3 d-flex justify-content-center align-items-center">
            <img src="../uploadimg/<?php echo $row['uploadimgDB']; ?>" style="width:350px" class="img-fluid rounded">
          </div>

          <div class="text-capitalize col-12 col-sm-12 col-md-12 col-lg-8 p-3">
            <div class="d-flex flex-row flex-wrap">
              <h1 class="card-text text-capitalize"><?php echo $row['bookname']; ?></h1>
            </div>
            <div class="d-flex flex-row flex-wrap mt-2 text-success">
              <h5 class="card-text text-capitalize"><?php echo $row['authorname']; ?></h5>
            </div>
            <div class="mt-3">
              <h5 class="card-title text-danger">Description: </h5>
              <h6 class="card-text text-justify"><?php echo $row['description']; ?></h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</form>


<!-- footer -->
<footer class="bg-dark text-center bottom">
  <div class="container text-white p-1">
    <small>&copy; E-Library 2023. Made in <a href="https://coloredcow.com/"><img style="width:16px" class="mb-1" src="../image/ColoredCow-logo-white.png" alt="logo"></a> ColoredCow Tehri. </small>
  </div>
</footer>

<!-- ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- bootstrap -->
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->

<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>
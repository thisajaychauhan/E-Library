<!-- html header -->
<?php include 'partials/html-header.php'; ?>

<!-- navbar -->
<?php include 'partials/navbar.php'; ?>

<!-- /tagline -->
<?php include 'partials/tagline.php'; ?>

<!-- card view -->
<div class="container d-flex justify-content-center mt-5">
    <div class="card rounded-0 mt-5" style="width:500px">
        <div class="card-header rounded-0 bg-dark text-white">
            <h1 class="text-center text-capitalize">welcome to the <br> e-library</h1>
        </div>
        <div class="card-body">
      <a href="../view/login.view.php" role="button" class="btn btn-light m-1 col-12 text-dark border rounded-0" name="registerbtn">login</a>
      <a href="register.php" role="button" class="btn btn-light m-1 col-12 text-dark border rounded-0" name="registerbtn">register</a>
    </div>
  </div>
</div>


<!-- footer -->
<footer class="bg-dark text-center fixed-bottom">
    <div class="container text-white p-1">
    <small>&copy; E-Library 2023. Made in  <a href="https://coloredcow.com/"><img style="width:16px" class="mb-1" src="ColoredCow-logo-white.png" alt="logo"></a> ColoredCow Tehri. </small>
    </div>
</footer>

</body>

</html>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="toastr.min.css">
    <!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="toastr.min.js"></script>

<title>Document</title>
</head>

<body>
  <a role="button" id="success">toast</a>

  <script type="text/javascript">
    // Default Configuration
    $('#success').on("click", function() {
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      toastr["success"]("Login Successfull")
    });
  </script>
</body>

</html> -->

login with toastr
<!DOCTYPE html>
<html>

<head>
  <title>Login Page</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
</head>

<body>
  <form method="post" action="">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <input type="submit" value="Login">
  </form>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    function showToast(message, type) {
      toastr.options = {
        "positionClass": "toast-top-right",
        "timeOut": "5000"
      }

      switch (type) {
        case 'success':
          toastr.success(message);
          break;

        case 'error':
          toastr.error(message);
          break;

        case 'warning':
          toastr.warning(message);
          break;

        case 'info':
          toastr.info(message);
          break;

        default:
          toastr.info(message);
          break;
      }

    }
  </script>


<script>
// Example usage
showToast('Login successful!', 'success');
showToast('Invalid credentials. Please try again.', 'error');
</script>


</body>

</html>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
  <title>Document</title>
</head>
<body>
  








<!-- Bootstrap JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>




</body>
</html>
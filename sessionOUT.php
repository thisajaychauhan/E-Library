<!-- session out -->

<?php
session_start();

// If the role is 'admin', unset the 'promoted_to_admin' session variable
if (isset($_SESSION['record'])) {
    $data = $_SESSION['record'];
    $role = $data[0];

    if ($role == 'admin') {
        unset($_SESSION['promoted_to_admin']);
    }
}

// Destroy session
session_destroy();

// Redirect to login page
header("Location: login.php");
exit;
?>
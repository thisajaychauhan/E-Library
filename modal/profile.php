<?php
include '../config/connection.php';

$data = $_SESSION['user_data'];
$email = $data['1'];

$query = "SELECT * FROM registration WHERE email = '$email' ";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
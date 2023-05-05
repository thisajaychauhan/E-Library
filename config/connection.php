<?php

// $server = 'sql301.epizy.com';
// $user = 'epiz_34111311';
// $password = 'ajayinfinity@123';
// $dbname = 'epiz_34111311_e_library';

$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'libraryapp';


$con = mysqli_connect($server, $user, $password, $dbname);

if(!$con){
    echo 'connection fail';
}
?>
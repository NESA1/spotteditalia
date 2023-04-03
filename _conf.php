<?php 

$host_name = 'db5012526560.hosting-data.io';
$database = 'dbs10529727';
$user_name = 'dbu5551612';
$password = 'Leonardo-01042023';

$conn = mysqli_connect($host_name, $user_name, $password, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

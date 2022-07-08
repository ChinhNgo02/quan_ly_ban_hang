<?php

$token = $_POST['token'];
$password = $_POST['password'];

require 'admin/connect.php';

$sql = "SELECT customer_id from forget_password where token = '$token'";
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result) === 0) {
    header('location:index.php');
    exit;
}

$customer_id = mysqli_fetch_array($result)['customer_id'];
$sql = "UPDATE customers set 
    password = '$password' WHERE id = '$customer_id'";
mysqli_query($connect,$sql);

$sql = "delete from forget_password where token = '$token'";
mysqli_query($connect,$sql);
header('location:index.php');
mysqli_close($connect);
?>
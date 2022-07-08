<?php

require 'connect.php';
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "select * from admin where email = '$email' and password = '$password'";
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result)) {
    $each = mysqli_fetch_array($result);
    session_start();
    
    $_SESSION['id'] = $each['id'];
    $_SESSION['level'] = $each['level'];
    $_SESSION['name'] = $each['name'];
    header('location: root/index.php');
    exit;
}

header("Location:index.php");
?>
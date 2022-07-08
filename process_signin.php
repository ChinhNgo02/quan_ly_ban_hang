<?php

$email = $_POST['email'];
$password = $_POST['password'];
if(isset($_POST['remember'])) {
    $remember = true;
} else {
    $remember = 0;
}

require 'admin/connect.php';

$sql = "SELECT * FROM customers where email = '$email' and password = '$password'";
$result = mysqli_query($connect,$sql);
$number_rows = mysqli_num_rows($result);
if($number_rows == 1) {
// echo"Đăng nhập thành công";
    session_start();
    $each = mysqli_fetch_array($result);
    $id = $each['id'];
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $each['name'];
    if($remember) {
        $token = uniqid('user_', true);
        $sql = "update customers set token = '$token' where id = '$id'";
        mysqli_query($connect,$sql);
        setcookie('remember',$token, time() + 60*60*24*30);
        
    }
    header('location:user.php');
    exit;
}
else {
   echo "Đăng nhập sai rồi";
}
mysqli_close($connect);

?>
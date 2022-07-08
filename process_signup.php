<?php

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];
require 'admin/connect.php';

$sql = "SELECT count(*) FROM customers where email = '$email'";

$result = mysqli_query($connect,$sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];
if($number_rows == 1) {
    echo "Trùng email rồi. Bạn chắc chứ";
    exit;
}

$sql = "insert into customers(name, email, password, phone_number, address) values ('$name', '$email', '$password', '$phone_number', '$address')";
mysqli_query($connect,$sql);

// require 'mail.php';
// $title = "Bạn đã đăng kí thành công";
// $content = "Chúc mừng bạn đã đăng ký nick bán hàng thành công.Bạn có thể vào link này để nhận quà tặng <a href='https://www.facebook.com/K2Cr2O7.293'> Ấn đi nào </a>";
// sendmail($email, $name, $title, $content);

$sql = "SELECT id FROM customers where email = '$email'";
$result = mysqli_query($connect,$sql);
$id = mysqli_fetch_array($result)['id'];
session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;
mysqli_close($connect);
echo 1;

?>
<?php

function current_url()
{
    $url      = "http://" . $_SERVER['HTTP_HOST'];
    return $url;
}

$email = $_POST['email'];
require 'admin/connect.php';

$sql = "SELECT id,name from customers
where email = '$email'";
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result) === 1) {
    $each = mysqli_fetch_array($result);
    $id = $each['id'];
    $name = $each['name'];
    $sql = "delete FROM forget_password
    where customer_id = '$id'";
    mysqli_query($connect,$sql);
    $token = uniqid();
    $sql = "insert into forget_password(customer_id,token) values('$id','$token')";
    mysqli_query($connect,$sql);
    $link = current_url() . '/web_co_ban/change_new_password.php?token='.$token;
   require 'mail.php';
   $title = "Change New Password";
   $content = " Bấm vào đây để nhận giải <a href='$link'> Hiệu lực trong 24h </a>";
   sendmail($email, $name, $title, $content);
}
echo " Vào gmail để xác nhận";

?>
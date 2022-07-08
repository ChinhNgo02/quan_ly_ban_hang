<?php
    session_start();
    if(empty($_SESSION['id'])) {
        header('Location:signin.php?error=Đăng nhập đi bạn iu dấu!!');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    Đây là trang người dùng. Xin chào bạn
    <?php
    echo $_SESSION['name'];
    header('location:index.php');
    ?>

    <a href="signout.php" style="float:right;">
        Đăng xuất
    </a>
</body>

</html>
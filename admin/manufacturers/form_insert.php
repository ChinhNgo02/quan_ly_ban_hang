<?php
require '../check_super_admin_login.php';
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
    <?php
        include '../menu.php';
    ?>
    <form action="process_insert.php" method="post">
        Tên
        <input type="text" name="name">
        <br>
        Địa chỉ
        <textarea name="address"> </textarea>
        <br>
        Điện thoại
        <input type="text" name="phone">
        <br>
        Ảnh
        <input type="text" name="photo">
        <br>
        <button>Thêm</button>
    </form>
</body>

</html>
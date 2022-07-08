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
    <style>
    a {
        text-decoration: none;
    }
    </style>
</head>

<body>
    Đây là khu vực quản lý nhà sản xuất
    <a href="form_insert.php">
        Thêm
    </a>

    <?php
    include '../menu.php';
    require '../connect.php';
    $sql = "SELECT * FROM manufacturers ";
    $result = mysqli_query($connect, $sql);
?>
    <table width="100%" border="1" cellspacing="">
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Ảnh</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php foreach ($result as $each): ?>
        <tr>
            <td><?php echo $each['id']; ?></td>
            <td><?php echo $each['name']; ?></td>
            <td><?php echo $each['address']; ?></td>
            <td><?php echo $each['phone']; ?></td>
            <td>
                <img height="100" src="<?php echo $each['photo']; ?>">
            </td>
            <td>
                <a href="form_update.php?id=<?php echo $each['id']; ?>">
                    Sửa
                </a>
            </td>
            <td>
                <a href="delete.php?id=<?php echo $each['id']; ?>">
                    Xóa
                </a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>

</body>

</html>
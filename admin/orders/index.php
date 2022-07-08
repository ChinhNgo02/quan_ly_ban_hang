<?php
require '../check_admin_login.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .can_giua {
        text-align: center;
    }
    </style>
</head>

<body>
    <?php
    require '../connect.php';
    $sql = "SELECT 
    orders.*,
    customers.address,
    customers.name,
    customers.phone_number
    FROM orders
    join customers
    on customers.id = orders.customer_id
    ";
    $result = mysqli_query($connect,$sql);
    
    ?>

    <table border="1" width="100%" cellspacing="0" cellpadding="">
        <tr>
            <th>Mã</th>
            <th>Thời gian đặt</th>
            <th>Thông tin người nhận</th>
            <th>Thông tin người đặt</th>
            <th>Trạng thái</th>
            <th>Tổng tiền</th>
            <th>Xem</th>
            <th>Sửa</th>
        </tr>
        <?php foreach ($result as $each): ?>
        <tr>
            <td><?php echo $each['id']; ?></td>
            <td><?php echo $each['created_at']; ?></td>
            <td>
                <?php echo $each['name_receiver']; ?>
                <br>
                <?php echo $each['phone_receiver']; ?>
                <br>
                <?php echo $each['address_receiver']; ?>
                <br>
            </td>
            <td>
                <?php echo $each['name']; ?>
                <br>
                <?php echo $each['phone_number']; ?>
                <br>
                <?php echo $each['address']; ?>

            </td>
            <td>
                <?php
                    switch ($each['status']) {
                        case '0':
                        echo "Mới đặt";
                        break;
                        case '1':
                        echo "Đã duyệt";
                        break;                        
                        case '2':
                        echo "Đã hủy";
                        break;
                    }
                ?>
            </td>
            <td>
                <?php echo $each['total_price']; ?>
            </td>
            <td>
                <a href="detail.php?id=<?php echo $each['id']; ?>">
                    Xem
                </a>
            </td>
            <td>
                <?php if($each['status'] == 1){ ?>
                <a href="update.php?id=<?php echo $each['id']; ?>&status=2">
                    Hủy
                </a>
                <?php } else if($each['status'] == 2) { ?>
                <a href="update.php?id=<?php echo $each['id']; ?>&status=1">
                    Duyệt
                </a>
                <?php } else if($each['status'] == 0) { ?>
                <a href="update.php?id=<?php echo $each['id']; ?>&status=1" class="can_giua">
                    Duyệt
                </a>
                <br>
                <a href="update.php?id=<?php echo $each['id']; ?>&status=2" class="can_giua">
                    Hủy
                </a>
                <?php } ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
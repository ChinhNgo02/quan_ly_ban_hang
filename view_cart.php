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
        session_start();
        $cart = $_SESSION['cart'];
        $total = 0;
    ?>
    <table border="1" cellspacing="0" cellpadding="" width="100%">
        <tr>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Xóa</th>
        </tr>
        <?php foreach ($cart as $id => $each) { ?>
        <tr>
            <td>
                <img height="100" src="admin/products/photos/<?php echo $each['photo']; ?>">
            </td>
            <td><?php echo $each['name']; ?></td>
            <td>
                <span class="span-price">
                    <?php echo $each['price']; ?>
                </span>
            </td>
            <td>
                <button class="btn-update-quantity" data-id="<?php echo $id; ?>" data-type="0">
                    -
                </button>
                <span class="span-quantity">
                    <?php echo $each['quantity']; ?>
                </span>
                <button class="btn-update-quantity" data-id="<?php echo $id; ?>" data-type="1">
                    +
                </button>
            </td>
            <td>
                <span class="span-sum">
                    <?php 
                    $sum = $each['price'] * $each['quantity'];
                    $total += $sum;
                    echo $sum; ?>
                </span>
            </td>
            <td>
                <button class="btn-delete" data-id="<?php echo $id; ?>">
                    Xóa
                </button>
            </td>
        </tr>
        <?php } ?>
    </table>
    <h1>
        Tồng tiền hóa đơn: $
        <span id="span-total">
            <?php echo $total ?>
        </span>
    </h1>
    <?php 
        $id = $_SESSION['id'];
        require 'admin/connect.php';
        $sql = "SELECT * FROM customers where id = '$id'";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);
    ?>
    <form action="process_checkout.php" method="post">
        Tên người nhận
        <input type="text" name="name_receiver" value="<?php echo $each['name']; ?>">
        <br>
        Sđt người nhận
        <input type="text" name="phone_receiver" value="<?php echo $each['phone_number']; ?>">
        <br>
        Địa chỉ người nhận
        <input type="text" name="address_receiver" value="<?php echo $each['address']; ?>">
        <br>
        <button>Đặt hàng</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".btn-update-quantity").click(function() {
            let btn = $(this);
            let id = btn.data("id");
            let type = parseInt(btn.data("type"));
            $.ajax({
                    type: "GET",
                    contentType: "application/json; charset=utf-8",
                    url: "update_quantity_in_cart.php",
                    data: {
                        id,
                        type
                    },

                })
                .done(function() {
                    let parent_tr = btn.parents("tr");
                    let price = parent_tr.find(".span-price").text();
                    let quantity = parent_tr.find(".span-quantity").text();
                    if (type == 1) {
                        quantity++;
                    } else {
                        quantity--;
                    }
                    if (quantity === 0) {
                        parent_tr.remove();
                    } else {
                        parent_tr.find(".span-quantity").text(quantity);
                        let sum = price * quantity;
                        parent_tr.find(".span-sum").text(sum);
                    }
                    getTotal();
                });
        });

        $(".btn-delete").click(function() {
            let btn = $(this);
            let id = btn.data("id");
            $.ajax({
                    type: "GET",
                    contentType: "application/json; charset=utf-8",
                    url: "delete_form_cart.php",
                    data: {
                        id
                    },

                })
                .done(function() {
                    btn.parents("tr").remove();
                    getTotal();
                });
        });
    });

    function getTotal() {
        let total = 0;
        $(".span-sum").each(function() {
            total += parseFloat($(this).text());
        });
        $("#span-total").text(total);
    }
    </script>
</body>

</html>
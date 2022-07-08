<style type="text/css">
li {
    float: right;
    margin-right: 15px;
    list-style: none;
}
</style>

<div id="tren">
    <ol>
        <li>
            <a href="index.php">
                Trang chủ
            </a>
        </li>
        <li class="menu-guest" style=<?php if (!empty($_SESSION['id'])) { ?>display:none; <?php } ?>>
            <a href="signin.php">
                Đăng nhập
            </a>
        </li>
        <li class="menu-guest" style=<?php if (!empty($_SESSION['id'])) { ?>display:none; <?php } ?>>
            <button type="button" data-toggle="modal" data-target="#modal-signup">
                Đăng ký
            </button>

        </li>

        <li class="menu-user" style=<?php if (empty($_SESSION['id'])) { ?>display:none; <?php } ?>>
            <span id="span-name">
                Chào bạn <?php echo $_SESSION['name'] ?? ' ' ?>
            </span>
            <a href="signout.php">
                Đăng xuất
            </a>
        </li>
        <li class="menu-user" style=<?php if (empty($_SESSION['id'])) { ?>display:none; <?php } ?>>
            <a href="view_cart.php">
                Xem giỏ hàng
            </a>
        </li>

    </ol>
</div>

<?php
if (empty($_SESSION['id'])) {
    include 'signup.php';
}
?>
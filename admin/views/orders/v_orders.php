<?php

if (isset($_GET['success'])) {
    $abc = $_GET['success'];
    echo '<script>alert("cập nhật sản phẩm thành công!")</script>';
}
if (isset($_GET['error'])) {
    echo '<script>alert("Thêm sản phẩm thất bại!")</script>';
}

?>

<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">Quản lý đơn hàng</h3>
                <div id="clock"></div>
            </div>
        </div>
    </div>

    <!-- container main -->
    <main class="container__main">
        <div class="container__table">
            <table>
                <tr>
                    <th>Thời gian đặt</th>
                    <th>Thông tin người nhận</th>
                    <th>Địa chỉ/Sđt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng Thái</th>
                    <th>Tính năng</th>
                </tr>
                <!-- render danh sách sản phẩm -->
                <?php foreach ($orders as $each) { ?>
                <tr>
                    <td><?= $each->order_date; ?></td>
                    <td><?= $each->name_customer; ?></td>
                    <td class="container__table-desc-parent">
                        <div class="container__table-desc">
                            <p>email: <?= $each->email; ?></p>
                            <p>địa chỉ:<?= $each->address ?> || sđt:<?= $each->phone_number ?></p>
                        </div>
                    </td>
                    <td>$ <?= $each->total; ?>.00</td>
                    <td style="font-weight: bold;">
                        <h3><?= $each->status ?></h3>
                        <?php if ($each->status == 'Đã xác nhận đơn hàng') { ?>
                        <a href="order-status.php?id_order=<?= $each->id; ?>&action=1">
                            Hủy xác nhận
                        </a>
                        </br>
                        <?php } else if ($each->status == 'Đang chờ xác nhận') { ?>
                        <a
                            href="order-status.php?id_order=<?= $each->id; ?>&action=2&email=<?= $each->email; ?>&name=<?= $each->name_customer; ?>">
                            Xác nhận
                        </a>
                        </br>
                        <?php } ?>
                        <?php if ($each->status != 'Đã hủy đơn hàng') { ?>
                        <a href="order-status.php?id_order=<?= $each->id; ?>&action=3">
                            Hủy đơn hàng
                        </a>
                        <?php } ?>
                    </td>
                    <td>
                        <a href="order-detail.php?id_order=<?= $each->id; ?>" title="Xem chi tiết đơn hàng">
                            <i class="fa-solid fa-clipboard fs-1"></i>
                        </a>
                        <a href="delete-order.php?id_order=<?= $each->id; ?>" title="Xóa đơn hàng">
                            <i class="fa-solid fa-trash-can fs-1"></i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </main>
</main>
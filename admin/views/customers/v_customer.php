<?php

if (isset($_GET['success'])) {
    $abc = $_GET['success'];
    echo '<script>alert("cập nhật người dùng thành công!")</script>';
}
if (isset($_GET['error'])) {
    echo '<script>alert("Thêm người dùng thất bại!")</script>';
}

?>
<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">Quản lý người dùng</h3>
                <div id="clock"></div>
            </div>
        </div>
    </div>
    <!-- container main -->
    <main class="container__main">
        <div class="container__main-handler">
            <div class="container__main-link">
                <a href="add-customer.php">
                    Thêm người dùng mới
                </a>
            </div>
            <div class="container__main-search">
                <form action="">
                    <input type="search" name="search" id="" placeholder="Tìm kiếm người dùng">
                </form>
            </div>
        </div>
        <div class="container__table">
            <table>
                <tr>
                    <th>Tên người dùng</th>
                    <th>Hình ảnh</th>
                    <th>Address</th>
                    <th>Phone_number</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Tính năng</th>
                </tr>
                <!-- render-products -->
                <?php foreach ($list as $key => $each) : ?>
                <tr>
                    <td><?= $each->name_customer; ?></td>
                    <td>
                        
                            <?php if ($each->picture==NULL) {?> 
                                <img src="public/front-end/images/trend-avatar-1.jpg" alt=""
                            class="img_item">
                                <?php } else { ?>
                            <img src="public/front-end/images/customer/<?= $each->picture; ?>" alt=""
                                                        class="img_item">
                                <?php } ?>
                    </td>
                    <td><?= $each->address; ?></td>
                    <td><?= $each->phone_number; ?></td>
                    <td><?= $each->email; ?></td>
                    <td><?= $each->role_name; ?></td>
                    <td>
                        <a href="edit-customer.php?id=<?= $each->id; ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="delete-customer.php?id=<?= $each->id; ?>">
                        <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
    </main>
</main>
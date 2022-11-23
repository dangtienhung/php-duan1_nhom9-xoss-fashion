<?php
@session_start();
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
                <!-- <a href="add-customer.php">
                    Thêm người dùng mới
                </a> -->
                <a data-bs-toggle="modal" data-bs-target="#openModal" class="text-white" style="cursor: pointer;">
                    <i class="fa-solid fa-plus"></i>
                    Tạo sản phẩm mới
                </a>
            </div>
            <div class="container__main-search">
                <form action="">
                    <input type="search" name="search" id="" placeholder="Tìm kiếm người dùng" value="<?php if (isset($_GET['search'])) {
                                                                                                            echo $_GET['search'];
                                                                                                        } ?>">
                </form>
            </div>
        </div>
        <div class="container__main-handler-mobile">
            <a data-bs-toggle="modal" data-bs-target="#openModal" class="text-white" style="cursor: pointer;">
                <i class="fa-solid fa-plus"></i>
                Tạo sản phẩm mới
            </a>
            <div class="container__main-search">
                <form action="">
                    <input type="search" name="search" id="" placeholder="Tìm kiếm danh mục sản phẩm" value="<?php if (isset($_GET['search'])) {
                                                                                                                    echo $_GET['search'];
                                                                                                                } ?>">
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
                    <th>Mật khẩu</th>
                    <th>Tính năng</th>
                </tr>
                <!-- render-products -->
                <?php foreach ($list as $key => $each) : ?>
                <tr>
                    <td><?= $each->name_customer; ?></td>
                    <td>
                        <?php if ($each->picture == NULL) { ?>
                        <img src="public/front-end/images/trend-avatar-1.jpg" alt="" class="img_item">
                        <?php } else { ?>
                        <img src="public/front-end/images/customer/<?= $each->picture; ?>" alt="" class="img_item">
                        <?php } ?>
                    </td>
                    <td><?= $each->address; ?></td>
                    <td><?= $each->phone_number; ?></td>
                    <td><?= $each->email; ?></td>
                    <?php if ($_SESSION['admin_role'] == 1) { ?>
                    <td><?= $each->passWord; ?></td>
                    <?php } else { ?>
                    <td>*******</td>
                    <?php } ?>
                    <td>
                        <a href="delete-customer.php?id=<?= $each->id_customer; ?>">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
    </main>
</main>

<!-- Modal -->
<div class="modal fade modal-xl" id="openModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="exampleModalLabel">Thêm người dùng mới</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="process-add-customer.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="username" class="form-label fs-3">Tên người dùng</label>
                        <input required type="text" class="form-control fs-3" id="username" placeholder="Tên người dùng"
                            name="username">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fs-3">Email người dùng</label>
                        <input required type="text" class="form-control fs-3" id="email" placeholder="Email người dùng"
                            name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fs-3">Mật khẩu người dùng</label>
                        <input required type="text" class="form-control fs-3" id="password"
                            placeholder="Password người dùng" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label fs-3">Hình ảnh</label>
                        <input required class="form-control fs-3" type="file" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label fs-3">Địa chỉ khách hàng</label>
                        <input required type="text" class="form-control fs-3" id="address"
                            placeholder="address người dùng" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label fs-3">số điện thoại khách hàng</label>
                        <input required type="text" class="form-control fs-3" id="phone_number"
                            placeholder="phone_number người dùng" name="phone_number">
                    </div>
                    <input type="hidden" class="form-control fs-3" id="role" placeholder="role người dùng" name="role"
                        value="3">
                    <div class="modal-footer">
                        <button class="fs-4 btn btn-danger" name="btn-submit" type="submit">Thêm người
                            dùng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
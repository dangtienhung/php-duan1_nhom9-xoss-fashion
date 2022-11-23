<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">Quản lý sản phẩm</h3>
                <div id="clock"></div>
            </div>
        </div>
    </div>

    <!-- container main -->
    <main class="container__main">
        <div class="container__main-handler">
            <div class="container__main-link">
                <a data-bs-toggle="modal" data-bs-target="#openModal" class="text-white">
                    <i class="fa-solid fa-plus"></i>
                    Thêm nhân viên
                </a>
            </div>
            <div class="container__main-search">
                <form action="">
                    <input type="search" name="search" id="" placeholder="Tìm kiếm sản phẩm" value="<?php if (isset($_GET['search'])) {
                                                                                                        echo $_GET['search'];
                                                                                                    } ?>">
                </form>
            </div>
        </div>
        <div class="container__main-handler-mobile">
            <button data-bs-toggle="modal" data-bs-target="#openModal" class="btn btn-danger fs-4" name="submit">
                <i class="fa-solid fa-plus"></i>
                Thêm nhân viên</button>
            <div class="container__main-search">
                <form action="">
                    <input type="search" name="search" id="" placeholder="Tìm kiếm sản phẩm">
                </form>
            </div>
        </div>
        <div class="container__table">
            <table>
                <tr>
                    <th>Tên nhân viên</th>
                    <th>Ảnh</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Tính năng</th>
                </tr>
                <!-- tbody -->
                <tbody>
                    <?php foreach ($list_staffs as $each) { ?>
                    <tr>
                        <td><?= $each->name_customer; ?></td>
                        <td>
                            <?php if ($each->picture == null) { ?>
                            <img src="public/front-end/images/trend-avatar-1.jpg" alt="" class="img_item">
                            <?php } else { ?>
                            <img src="public/front-end/images/staff/<?= $each->picture; ?>" alt="" class="img_item">
                            <?php } ?>
                        </td>
                        <td><?= $each->email; ?></td>
                        <td><?= $each->address; ?></td>
                        <td><?= $each->phone_number; ?></td>
                        <td>
                            <a href="edit-staff.php?id=<?php echo $each->id; ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="delete-staff.php?id=<?php echo $each->id; ?>">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade modal-xl" id="openModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-3" id="exampleModalLabel">Thêm nhân viên mới</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="action-add-staff.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Tên nhân viên</label>
                            <input type="text" class="form-control fs-3" name="name-staff" placeholder="Tên nhân viên"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Email</label>
                            <input type="email" class="form-control fs-3" name="email-staff" placeholder="Email"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Mật khẩu</label>
                            <input type="text" class="form-control fs-3" name="password-staff" placeholder="Mật khẩu"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Ảnh đại diện</label>
                            <input class="form-control fs-3" type="file" id="picture" name="picture" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Địa chỉ</label>
                            <input type="text" class="form-control fs-3" name="address-staff" placeholder="Địa chỉ"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Số điện thoại</label>
                            <input type="phone" class="form-control fs-3" name="phone-staff" placeholder="Số điện thoại"
                                required>
                        </div>
                        <input type="hidden" class="form-control fs-3" name="role-staff" value="2" required>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary fs-4" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-danger fs-4" data-bs-target="submit-form"
                                name="submit">Thêm nhân viên</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
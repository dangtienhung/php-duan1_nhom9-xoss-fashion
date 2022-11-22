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

    <!-- Modal -->
    <div class="mt-4" id="openModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="action-edit-staff.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control fs-3" name="id-staff" placeholder="Tên nhân viên"
                            value="<?= $info->id; ?>">
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Tên nhân viên</label>
                            <input type="text" class="form-control fs-3" name="name-staff" placeholder="Tên nhân viên"
                                value="<?= $info->name_customer; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Email</label>
                            <input type="email" class="form-control fs-3" name="email-staff" placeholder="Email"
                                value="<?= $info->email; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Mật khẩu</label>
                            <input type="text" class="form-control fs-3" name="password-staff" placeholder="Mật khẩu"
                                value="<?= $info->passWord; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Ảnh đại diện</label>
                            <input class="form-control fs-3" type="file" id="picture" name="picture-new" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label fs-3">Hoặc giữ lại hình ảnh</label><br />
                            <input class="form-control fs-4" value="<?= $info->picture; ?>" type="hidden"
                                id="picture-old" name="picture-old">
                            <img src="public/front-end/images/staff/<?php echo $info->picture ?>"
                                class="body__image img_item" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Địa chỉ</label>
                            <input type="text" class="form-control fs-3" name="address-staff" placeholder="Địa chỉ"
                                value="<?php echo $info->address ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Số điện thoại</label>
                            <input type="phone" class="form-control fs-3" name="phone-staff" placeholder="Số điện thoại"
                                value="<?php echo $info->phone_number ?>">
                        </div>
                        <input type="hidden" class="form-control fs-3" name="role-staff" value="2" required>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger fs-4" data-bs-target="submit-form"
                                name="submit">Sửa nhân viên</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
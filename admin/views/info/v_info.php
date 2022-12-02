
<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">Thông tin</h3>
                <div id="clock"></div>
            </div>
        </div>
    </div>
    <!-- container main -->
    <div class="row mt-3">
            <h2>Hồ sơ của tôi</h2>
            <div class="col-sm-12 col-md-6">
                <form action="change_info.php" method="POST" enctype="multipart/form-data" >

                        <input type="text" name="current_phone_number" value="<?php echo $user->phone_number?>"
                            id="phone_number" hidden>
                        <!-- curent email -->
                        <input type="email" name="current_email" value="<?php echo $user->email?>" id="email" hidden>

                        <!-- curent name -->
                        <input type="text" name="current_name" value="<?php echo $user->name_customer?>" id="name"
                            hidden>
                        <input type="text" name="current_address" value="<?php echo $user->address?>" id="address"
                            hidden>
                    <div class="mb-3 fs-3">
                        <label for="username" class="form-label">Tên nhân viên</label>
                        <input class="form-control py-3 fs-3" type="text" id="name_value" name="user_name"  value="<?php echo $user->name_customer?>" disabled>
                        <button id="change_user_name" type="button"><i class="fa-solid fa-pen-to-square"></i></button>
                    </div>
                    <div class="mb-3 fs-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control py-3 fs-3" type="email" id="email_value" name="email" value="<?php echo $user->email?>" disabled>
                        <button id="change_email" type="button"><i class="fa-solid fa-pen-to-square"></i></button>
                    </div>
                    <div class="mb-3 fs-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input class="form-control py-3 fs-3" type="text" id="phone_number_value" name="phoneNumber" value="<?php echo $user->phone_number?>" disabled>
                        <button id="change_phone_number" type="button"><i class="fa-solid fa-pen-to-square"></i></button>
                    </div>
                    <div class="mb-3 fs-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input class="form-control py-3 fs-3" type="text" placeholder="address" name="address" id="address_value"  value="<?php echo $user->address?>" disabled>
                        <button id="change_address" type="button"><i class="fa-solid fa-pen-to-square"></i></button>
                    </div>
                    <div class="mb-3 fs-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input class="form-control py-3 fs-3" type="password" placeholder="password" id="password"  value="<?php echo $user->passWord?>" disabled>
                        <button id="change_password" type="button"> <a href="change_pass.php"><i class="fa-solid fa-pen-to-square"></i></a></button>
                    </div>
                    <button class="btn btn-danger" name="btn_save">Lưu thông tin</button>
                </form>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="text-center d-flex justify-content-center align-items-center" style="height: 100%;">
                <?php if (($_SESSION['admin_id']) && $_SESSION['admin_picture'] == null) { ?>
                    <img src="public/front-end/images/customer/avatar-trang-facebook.jpg" alt="" style="height: 300px; width: 300px; object-fit: cover;" class="sidebar__admin-avatar">
                <?php } else { ?>
                    <img src="public/front-end/images/customer/<?= $_SESSION['admin_picture']; ?>" alt="" style="height: 300px; width: 300px; object-fit: cover;"
                    class="sidebar__admin-avatar">
                <?php } ?>
                        
                </div>
            </div>
        </div>
    </main>
<?php
    if(isset($_COOKIE['nofication'])) {
        echo '<script>alert("'.$_COOKIE['nofication'].'")</script>';
    }
?>
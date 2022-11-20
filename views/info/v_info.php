<div class="info__container">
    <!-- Aside Info -->
    <aside class="info__aside">
        <div class="info__aside-wrap-box">
            <!-- head aside -->
            <div class="info__aside-header">
                <div class="info__Avatar">
                    <img src="<?php if($user->picture == "") { echo "public/layout/images/no-image.png"; } else { echo "admin/public/front-end/images/customer/$user->picture"; }?>"
                        alt="">
                </div>
                <div class="info__Name-phone-number">
                    <h4><?php echo $user->name_customer?></h4>
                    <span>+ <?php echo $user->phone_number?></span>
                </div>
            </div>
            <!-- content aside -->
            <div class="info__aside-main">
                <!-- List Option -->
                <ul class="info__list-option">
                    <li class="active"><i class="fa-regular fa-id-badge"></i> Hồ Sơ</li>
                    <li><i class="fa-sharp fa-solid fa-money-check-dollar"></i> Ngân Hàng</li>
                    <li><i class="fa-solid fa-map-location-dot"></i> Địa Chỉ</li>
                    <li><i class="fa-solid fa-user-lock"></i> Đổi Mật Khẩu</li>
                    <li><i class="fa-solid fa-file-invoice-dollar"></i> Đơn Mua</li>
                    <li><i class="fa-sharp fa-solid fa-bell"></i> Thông báo</li>
                </ul>
            </div>
        </div>
    </aside>
    <!-- Main Content Info -->
    <main class="info__main-content">
        <div class="info__main-wrap-box">
            <!-- Infomaition -->
            <div class="info__main-infomation">
                <!-- Title -->
                <h2>Hồ sơ của tôi</h2>
                <h5>Quản lý thông tin hồ sơ để bảo mật tài khoản</h5>
                <!-- Content -->
                <div class="info__content-box">
                    <form action="?url=change_info.php" method="POST" enctype="multipart/form-data">
                        <!-- current phone_number -->
                        <input type="text" name="current_phone_number" value="<?php echo $user->phone_number?>"
                            id="phone_number" hidden>
                        <!-- curent email -->
                        <input type="email" name="current_email" value="<?php echo $user->email?>" id="email" hidden>

                        <!-- curent name -->
                        <input type="text" name="current_name" value="<?php echo $user->name_customer?>" id="name"
                            hidden>

                        <table class="info__table-view-info">
                            <tr>
                                <td>Tên đăng nhập</td>
                                <td><input type="text" id="name_value" name="user_name"
                                        value="<?php echo $user->name_customer?>" disabled> <button id="change_name"
                                        type="button">Thay đổi</button></span></td>
                            </tr>
                            <tr>
                                <td>email</td>
                                <td><input type="email" id="email_value" name="email" value="<?php echo $user->email?>"
                                        disabled> <button id="change_email" type="button">Thay đổi</button></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td><input type="text" id="phone_number_value" name="phoneNumber"
                                        value="<?php echo $user->phone_number?>" disabled> <button
                                        id="change_phone_number" type="button">Thay đổi</button></td>
                            </tr>
                        </table>
                        <div class="info__change-avatar">
                            <div class="info__view-avatar">
                                <img src="<?php if($user->picture == "") { echo "public/layout/images/no-image.png"; } else { echo "admin/public/front-end/images/customer/$user->picture"; }?>"
                                    alt="">
                                <input type="text" name="current_picture" value="<?php echo $user->picture?>" hidden>
                            </div>
                            <input name="avatar" type="file" accept=".jpg,.jpeg,.png" id="img_input">
                            <div class="info__image-preview" style="display: none;">
                                <p>Xem trước ảnh</p>
                                <div class="info__preview">
                                    <img src="" alt="" id="view_image">
                                </div>
                                <button type='button' id='cancel'>Hủy Lựa Chọn</button>
                            </div>
                            <p>Giới hạn dung lượng chỉ 1MB <br> định dạng jpg, jpeg, png</p>
                        </div>
                        <button class="info_btn-save" name="btn_save">Lưu thông tin</button>
                    </form>
                </div>
            </div>
            <!-- Bank -->
            <div class="info__main-bank">
                <!-- Title -->
                <h2>Thẻ Tín Dụng/Ghi Nợ</h2>
                <a href="#"><button class="info_btn-save"><i class="fa-regular fa-square-plus"></i> Thêm thẻ
                        mới</button></a>
                <!-- Content -->
                <h1 align="center">Bạn chưa liên kết tới ngân hàng nào</h1>
            </div>
            <!-- Address -->
            <div class="info__main-address">
                <!-- Title -->
                <h2>Địa chỉ của tôi</h2>
                <!-- Content -->
                <div class="info__address-wrap-box">
                    <h4><?php echo $user->name_customer?></h4> <span>+ <?php echo $user->phone_number?></span>
                    <p>Địa chỉ: <span><?php echo $user->address?></span></p>
                </div>
            </div>
            <!-- Change Pass -->
            <div class="info__main-change-pass">
                <!-- Title -->
                <h2>Đổi mật khẩu</h2>
                <h5>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</h5>
                <!-- Content -->
                <form action="?url=change_pass.php" class='info__form-pass' method="POST">
                    <label for="passWord">Your Password</label> <br>
                    <input type="password" name="passWord" placeholder="Enter Your Password">
                    <br>
                    <label for="new-password">New Password</label> <br>
                    <input type="password" name="new-password" placeholder="Enter New Password">
                    <br>
                    <label for="rePassWord">Repeat Password</label> <br>
                    <input type="password" name="rePassWord" placeholder="Repeat Password">
                    <br>
                    <button type="submit" class="info_btn-save" name="btn-change">Login</button>
                </form>
            </div>
            <!-- Bill -->
            <div class="info__main-bill">

            </div>
            <div class="info__main-notification">

            </div>
            <div class="info__main-notification">

            </div>
        </div>
    </main>
</div>
<?php
    if(isset($_COOKIE['nofication'])) {
        echo '<script>alert("'.$_COOKIE['nofication'].'")</script>';
    }
?>
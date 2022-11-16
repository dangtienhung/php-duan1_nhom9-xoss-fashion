<div class="info__container">
    <!-- Aside Info -->
    <aside class="info__aside">
        <div class="info__aside-wrap-box">
            <!-- head aside -->
            <div class="info__aside-header">
                <div class="info__Avatar">
                    <img src="<?php if($user->picture == "") { echo "public/layout/images/no-image.png"; } else { echo "public/layout/images/team/$user->picture"; }?>" alt="">
                </div>
                <div class="info__Name-phone-number">
                    <h4>DevidMonster</h4>
                    <span>+ 0916448844</span>
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
    <main class="info__main-contetn">
        <div class="info__main-wrap-box">
            <!-- Infomaition -->
            <div class="info__main-infomation">
                <!-- Title -->
                <h2>Hồ sơ của tôi</h2>
                <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                <!-- Content -->
                <div class="info__content-box">
                    <form action="?url=change_info.php" method="POST" enctype="multipart/form-data">
                        <!-- current phone_number -->
                        <input type="text" name="current_phone_number" value="<?php echo $user->phone_number?>" id="phone_number" hidden>
                        <!-- curent email -->
                        <input type="email" name="current_email" value="<?php echo $user->email?>" id="email" hidden>

                        <table class="info__table-view-info">
                            <tr>
                                <td>Tên đăng nhập</td>
                                <td><?php echo $user->name_customer?></td>
                            </tr>
                            <tr>
                                <td>email</td>
                                <td><input type="email" id="email_value" name="email" value="<?php echo $user->email?>"
                                        disabled> <button id="change_email" type="button">Thay đổi</button></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td><input type="text" id="phone_number_value" name="phoneNumber" value="<?php echo $user->phone_number?>"
                                        disabled> <button id="change_phone_number" type="button">Thay đổi</button></td>
                            </tr>
                        </table>
                        <div class="info__change-avatar">
                            <div class="info__view-avatar">
                                <img src="<?php if($user->picture == "") { echo "public/layout/images/no-image.png"; } else { echo "public/layout/images/team/$user->picture"; }?>" alt="">
                            </div>
                            <input name="avatar" type="file" accept=".jpg,.jpeg,.png">
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
                <a href="#"><button class="info_btn-save">+ Thêm thẻ mới</button></a>
                <!-- Content -->
                <h1 align="center">Bạn chưa liên kết tới ngân hàng nào</h1>
            </div>
            <!-- Address -->
            <div class="info__main-address">
                <!-- Title -->
                <h2>Địa chỉ của tôi</h2>
                <!-- Content -->
            </div>
            <!-- Change Pass -->
            <div class="info__main-change-pass">
                <!-- Title -->
                <h2>Đổi mật khẩu</h2>
                <p>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
                <!-- Content -->
            </div>
            <!-- Bill -->
            <div class="info__main-bill">

            </div>
            <div class="info__main-notification">

            </div>
        </div>
    </main>
</div>
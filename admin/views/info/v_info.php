
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
    <main class="container__main">
        <div class="container__main-handler">
            <div class="container__main-search">
                <form action="">
                    <input type="search" name="search" id="" placeholder="Tìm kiếm người dùng">
                </form>
            </div>
        </div>
        <div class="container__table">
        <form action="change_info.php" method="POST" enctype="multipart/form-data">
                        <!-- current phone_number -->
                        <input type="text" name="current_phone_number" value="<?php echo $user->phone_number?>"
                            id="phone_number" hidden>
                        <!-- curent email -->
                        <input type="email" name="current_email" value="<?php echo $user->email?>" id="email" hidden>

                        <!-- curent name -->
                        <input type="text" name="current_name" value="<?php echo $user->name_customer?>" id="name"
                            hidden>
                        <input type="text" name="current_pass" value="<?php echo $user->passWord?>" id="name"
                            hidden>
                        <table class="info__table-view-info">
                            <tr>
                                <td>Tên đăng nhập</td>
                                <td><input type="text" id="name_value" name="user_name"
                                        value="<?php echo $user->name_customer?>" >
                            </tr>
                            <tr>
                                <td>email</td>
                                <td><input type="email" id="email_value" name="email" value="<?php echo $user->email?>"
                                        >
                                </td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td><input type="text" id="phone_number_value" name="phoneNumber"
                                        value="<?php echo $user->phone_number?>" >
                            </tr>

                            <tr>
                                <td>Mất khẩu</td>
                                <td> 
                                <input type="password" id="passWord_value" name="passWword"
                                        value="<?php echo $user->passWord?>" >
                                    <a href="change_pass.php"><i class="fa-solid fa-pen-to-square"></i></a>
                            </tr>
               
                        </table>
                        <button class="btn btn-warning " name="btn_save">Lưu thông tin</button>
                    </form>

        </div>
    </main>
    </main>
<?php
    if(isset($_COOKIE['nofication'])) {
        echo '<script>alert("'.$_COOKIE['nofication'].'")</script>';
    }
?>
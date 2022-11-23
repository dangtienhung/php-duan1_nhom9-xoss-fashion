<!-- main -->
<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">Quản lý khách hàng</h3>
                <div id="clock"></div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
            <h2>Sửa Mật Khẩu</h2>
            <div class="col-sm-12 col-md-6">
                <form action="process_change_password.php" method="POST" enctype="multipart/form-data">
                
                    <div class="mb-3 fs-3">
                        <label for="passWord">Your Password</label> <br>
                        <input type="password" name="passWord" placeholder="Enter Your Password">
                    </div>
                    <div class="mb-3 fs-3">
                        <label for="new-password">New Password</label> <br>
                        <input type="password" name="new-password" placeholder="Enter New Password">
                    </div>
                    <div class="mb-3 fs-3">
                        <label for="rePassWord">Repeat Password</label> <br>
                        <input type="password" name="rePassWord" placeholder="Repeat Password">
                    </div>
                    <button type="submit" class="btn btn-danger" name="btn-change">Login</button>
                </form>
            </div>
        </div>
</main>


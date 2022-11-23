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

    <main class="container__main">
        <div class="" id="openModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog pb-3">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-1" id="exampleModalLabel">Sửa thông tin khách hàng</h1>
                    </div>
                    <div class="modal-body">
                        <form action="process_change_password.php" method="POST" enctype="multipart/form-data">
                            
                            
                            <div class=" mb-3">
                            <label for="passWord">Your Password</label> <br>
                            <input type="password" name="passWord" placeholder="Enter Your Password">
                            </div>
                            <div class=" mb-3">
                            <label for="new-password">New Password</label> <br>
                            <input type="password" name="new-password" placeholder="Enter New Password">
                            </div>
                            <div class=" mb-3">
                            <label for="rePassWord">Repeat Password</label> <br>
                            <input type="password" name="rePassWord" placeholder="Repeat Password">
                            </div>
                            <button type="submit" class="btn btn-danger" name="btn-change">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>


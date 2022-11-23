<!-- header -->
<header class="header">
    <div class="header__logout">
        <a href="logout_admin.php">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </a>
    </div>
    <i class="icon fa-solid fa-bars"></i>
</header>

<div class="sidebar__mobile-container active icon">
    <i class="fa-solid fa-xmark icon"></i>
</div>
<!-- aside mobile -->
<div class="sidebar__mobile active">
    <!-- admin -->
    <div class="sidebar__admin">
        <?php if (($_SESSION['admin_id']) && $_SESSION['admin_picture'] == null) { ?>
        <img src="public/front-end/images/customer/avatar-trang-facebook.jpg" alt="" class="sidebar__admin-avatar">
        <?php } else { ?>
        <img src="public/front-end/images/customer/<?= $_SESSION['admin_picture']; ?>" alt=""
            class="sidebar__admin-avatar">
        <?php } ?>
        <div class="sidebar__admin-body">
            <h3><?= $_SESSION['admin_name'] ?></h3>
            <p>Chào mừng bạn đã quay trở lại!</p>
        </div>
    </div>

    <!-- content -->
    <aside class="sidebar__menu">
        <ul class="sidebar__menu-list">
        <?php if ($_SESSION['admin_role']==1) { ?>
            <li>
                <a href="info.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-address-card"></i>
                    Thông tin admin
                </a>
            </li>
        <?php } else if ($_SESSION['admin_role']==2) { ?>
            <li>
                <a href="info.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-address-card"></i>
                    Thông tin admin
                </a>
            </li>
        <?php } ?>
            
            <li>
                <a href="staff.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-address-card"></i>
                    Quản lý nhân viên
                </a>
            </li>
            <li>
                <a href="home.php" class="sidebar__menu-link">
                    <i class="fa-brands fa-microsoft"></i>
                    Bảng điều khiển
                </a>
            </li>
            <li>
                <a href="product-categories.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-list"></i>
                    Quản lý danh mục sản phẩm
                </a>
            </li>
            <li>
                <a href="product.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-list-check"></i>
                    Quản lý sản phẩm
                </a>
            </li>
            <li>
                <a href="customer.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-users"></i>
                    Quản lý người dùng
                </a>
            </li>
            <li>
                <a href="comments.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-comments-dollar"></i>
                    Quản lý bình luận
                </a>
            </li>
        </ul>
    </aside>
</div>

<!-- aside -->
<div class="container-fluid sidebar">
    <!-- admin -->
    <div class="sidebar__admin">
        <?php if (($_SESSION['admin_id']) && $_SESSION['admin_picture'] == null) { ?>
        <img src="public/front-end/images/customer/avatar-trang-facebook.jpg" alt="" class="sidebar__admin-avatar">
        <?php } else { ?>
        <img src="public/front-end/images/customer/<?= $_SESSION['admin_picture']; ?>" alt=""
            class="sidebar__admin-avatar">
        <?php } ?>
        <div class="sidebar__admin-body">
            <h3><?= $_SESSION['admin_name'] ?></h3>
            <p>Chào mừng bạn đã quay trở lại!</p>
        </div>
    </div>

    <!-- content -->
    <aside class="sidebar__menu">
        <ul class="sidebar__menu-list">
        <?php if ($_SESSION['admin_role']==1)  { ?>
        <li>
                <a href="info.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-address-card"></i>
                    Thông tin admin
                </a>
            </li>
        <?php } else if($_SESSION['admin_role'] ==2) { ?>
            <li>
                <a href="show.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-address-card"></i>
                    Thông tin admin
                </a>
            </li>
        <?php } ?>
            
            <li>
                <a href="staff.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-address-card"></i>
                    Quản lý nhân viên
                </a>
            </li>
            <li>
                <a href="home.php" class="sidebar__menu-link">
                    <i class="fa-brands fa-microsoft"></i>
                    Bảng điều khiển
                </a>
            </li>
            <li>
                <a href="product-categories.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-list"></i>
                    Quản lý danh mục sản phẩm
                </a>
            </li>
            <li>
                <a href="product.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-list-check"></i>
                    Quản lý sản phẩm
                </a>
            </li>
            <li>
                <a href="customer.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-users"></i>
                    Quản lý người dùng
                </a>
            </li>
            <li>
                <a href="comments.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-comments-dollar"></i>
                    Quản lý bình luận
                </a>
            </li>
        </ul>
    </aside>
</div>
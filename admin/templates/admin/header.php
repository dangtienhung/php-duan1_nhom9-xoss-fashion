<!-- header -->
<header class="header">
    <div class="header__logout">
        <a href="logout_admin.php">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </a>
    </div>
</header>

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
            <li>
                <a href="home.php" class="sidebar__menu-link">
                    <i class="fa-brands fa-microsoft"></i>
                    Bảng điều khiển
                </a>
            </li>
            <li>
                <a href="product-categories.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-list-check"></i>
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
                    <i class="fa-solid fa-address-card"></i>
                    Quản lý user
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
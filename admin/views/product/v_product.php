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
                <a href="add-product.php">
                    <i class="fa-solid fa-plus"></i>
                    Tạo sản phẩm mới
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
        <!-- mobile -->
        <div class="container__main-handler-mobile">
            <div class="container__main-link">
                <a href="add-product.php">
                    <i class="fa-solid fa-plus"></i>
                    Tạo sản phẩm mới
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
        <div class="container__table">
            <table>
                <tr>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Sale</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th>Ngày nhận</th>
                    <th>Tính năng</th>
                </tr>

                <!-- render-products -->
                <?php foreach ($list_all_product as $key => $each) : ?>
                    <?php if($each->id_category != null) {?>
                        <tr>
                            <td><?= $each->name; ?></td>
                            <td><?= $each->price; ?></td>
                            <td><?= $each->saleOff; ?></td>
                            <td>
                                <img src="public/front-end/images/products/<?= $each->picture ?>" alt="" class="img_item">
                            </td>
                            <td class="container__table-desc-parent">
                                <div class="container__table-desc">
                                    <p><?= $each->description; ?></p>
                                </div>
                            </td>
                            <td><?= $each->date_added; ?></td>
                            <td>
                                <a href="upload-product.php?id=<?= $each->id; ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="delete-product.php?id=<?= $each->id; ?>">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    <?php }?>
                <?php endforeach; ?>
            </table>
        </div>
    </main>
</main>
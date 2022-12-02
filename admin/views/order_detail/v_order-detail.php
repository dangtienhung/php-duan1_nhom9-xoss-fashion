<?php

if (isset($_GET['success'])) {
    $abc = $_GET['success'];
    echo '<script>alert("cập nhật sản phẩm thành công!")</script>';
}
if (isset($_GET['error'])) {
    echo '<script>alert("Thêm sản phẩm thất bại!")</script>';
}

?>

<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">Quản lý đơn hàng</h3>
                <div id="clock"></div>
            </div>
        </div>
    </div>

    <!-- container main -->
    <main class="container__main">
        <div class="container__main-handler">
            <div class="container__main-link">
                <a href="orders.php" class="text-white" style="cursor: pointer;">
                    < Quay Lại </a>
            </div>
        </div>
        <div class="container__table">
            <table>
                <tr>
                    <td>#</td>
                    <td>Ảnh</td>
                    <td>Tên</td>
                    <td>Số lượng</td>
                    <td>giá</td>
                    <td>Tổng tiền</td>
                </tr>
                <!-- render danh sách sản phẩm -->
                <?php foreach ($order_detail as $key => $each) { ?>
                <tr>
                    <td><?= $key + 1; ?></td>
                    <td><img src="public/front-end/images/products/<?= $each->picture; ?>" alt="" class="img_item"></td>
                    <td><?= $each->name_product; ?></td>
                    <td class="container__table-desc-parent"><?= $each->quantity; ?></td>
                    <td>$ <?= $each->price; ?>.00</td>
                    <td>$ <?= $each->total; ?>.00</td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </main>
</main>

<!-- Modal -->
<div class="modal fade modal-xl" id="openModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="exampleModalLabel">Thêm danh mục sản phẩm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="action-product-category.php" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label fs-3">Tên danh mục</label>
                        <input type="text" class="form-control fs-3" name="name-product-category"
                            placeholder="Tên danh mục" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fs-3">Mô tả danh mục</label>
                        <textarea class="form-control fs-3" id="" rows="3" name="desc-product-category"
                            placeholder="Mô tả danh mục" required></textarea>
                    </div>
                    <select class="form-select fs-3" aria-label="Default select example" name="id_product_type">
                        <!-- render ra loại sản phẩm -->
                        <?php foreach ($category_type as $each) { ?>
                        <option value="<?= $each->id; ?>"><?= $each->type; ?></option>
                        <?php } ?>
                        <!-- end -->
                    </select>
                    <!-- <button id="btnSubmit" name="submit" class="btn btn-primary">oke</button> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary fs-4" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-danger fs-4" data-bs-target="submit-form"
                            name="submit">Thêm sản
                            phẩm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
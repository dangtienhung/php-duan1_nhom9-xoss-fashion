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
        <div class="" id="openModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog pb-3">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-1" id="exampleModalLabel">Sửa loại sản phẩm</h1>
                    </div>
                    <div class="modal-body">
                        <form action="action-edit-process-categories.php" method="post">
                            <input type="hidden" class="form-control fs-3" name="id-product-category"
                                placeholder="Tên danh mục" required value="<?= $category_item->id; ?>">
                            <div class="mb-3">
                                <label for="" class="form-label fs-3">Tên danh mục</label>
                                <input type="text" class="form-control fs-3" name="name-product-category"
                                    placeholder="Tên danh mục" required value="<?= $category_item->title_category; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label fs-3">Mô tả danh mục</label>
                                <textarea class="form-control fs-3" id="" rows="3" name="desc-product-category"
                                    placeholder="Mô tả danh mục" required><?= $category_item->description; ?></textarea>
                            </div>
                            <select class="form-select fs-3" aria-label="Default select example" name="id_product_type">
                                <!-- render ra loại sản phẩm -->
                                <?php foreach ($category_type as $each) { ?>
                                <option value="<?= $each->id; ?>"
                                    <?php if ($each->id == $category_item->id_category_type) { ?> selected <?php } ?>>
                                    <?= $each->type; ?>
                                </option>
                                <?php } ?>
                                <!-- end -->
                            </select>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary fs-4"
                                    data-bs-dismiss="modal"><a style="color:white;" href="product-categories.php">Đóng</a></button>
                                <button type="submit" class="btn btn-danger fs-4" data-bs-target="submit-form"
                                    name="submit">Sửa danh mục sản
                                    phẩm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</main>
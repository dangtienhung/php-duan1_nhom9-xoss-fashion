<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">sửa sản phẩm</h3>
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
                        <h1 class="modal-title fs-1" id="exampleModalLabel">Sửa sản phẩm</h1>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label fs-3">Tên sản phẩm</label>
                                <input type="text" class="form-control fs-3" id="name"
                                    placeholder="Tên sản phẩm" name="name" required value="<?= $list_item->name ;?>">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label fs-3">Giá sản phẩm</label>
                                <input type="text" class="form-control fs-3" id="price" placeholder="Giá sản phẩm"
                                    name="price" required value="<?= $list_item->price ;?>">
                            </div>
                            <div class="mb-3">
                                <label for="saleOff" class="form-label fs-3">Giảm giá sản phẩm</label>
                                <input type="number" min="0" class="form-control fs-3" id="sale"
                                    placeholder="Giảm giá sản phẩm" name="saleOff" required value="<?= $list_item->saleOff ;?>">
                            </div>
                            <div class="mb-3">
                                <label for="picture" class="form-label fs-3">HÌnh ảnh sản phẩm</label>
                                <input type="file" min="0" class="form-control fs-3" id="picture"
                                     name="new-picture">
                            </div>
                            <div class="mb-3">
                                <label for="picture" class="form-label fs-3">Giữ lại hình ảnh cũ</label>
                                <input type="hidden" name="picture-old" id="picture" value="<?= $list_item->picture?>">
                                <img src="public/front-end/images/products/<?= $list_item->picture?>"  class="body__image img_item" />
                            </div>
                            <div class="mb-3">  
                                <label for="description" class="form-label fs-3">Mô tả sản phẩm</label>
                                <textarea name="description" placeholder="Mô tả sản phẩm" class="form-control fs-3"
                                    id="description" rows="3" required ><?= $list_item->description ;?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label fs-3">Số lượng sản phẩm</label>
                                <input name="quantity" placeholder="Số lượng sản phẩm" class="form-control fs-3" id="quantity" value="<?= $list_item->quantity ;?>" required/>
                            </div>
                            <div class="mb-3">
                                <label for="saleOff" class="form-label fs-3">Lượt xem sản phẩm</label>
                                <input type="number" min="0" class="form-control fs-3" id="sale"
                                    placeholder="Lượt xem sản phẩm" name="view_number" required value="<?= $list_item->view_number ;?>">
                            </div>
                            <div class="mb-3">
                                <label for="id_category" class="form-label fs-3">Loại sản phẩm</label>

                                <select name="id_category" class="form-select fs-3"
                                    aria-label="Default select example" id="product_categories">
                                    <option value="">Để trong kho</option>
                                    <?php foreach ($category_type as $each) { ?>
                                        <option value="<?php echo $each->id; ?>">
                                            <?php echo $each->title_category; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button class="fs-4 btn btn-danger" name="btn-submit" type="submit">Sửa sản
                                    phẩm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</main>
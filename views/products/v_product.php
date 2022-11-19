<div class="products__container">
    <?php if(isset($_GET['search']) && !empty($_GET["search"])) {?>
        <h1 style="margin-left: 30px;" align='left'>tìm thấy <?php echo $number_count ?> kết quả tìm kiếm cho từ khóa "<?php echo $_GET["search"]?>"</h1>
    <?php } ?>
    <div class="row">
        <div class="col-md-3 col-xs-12 sidebar-container float-right">
            <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-12 product__category-bar">
                    <div class="products__sin_sidebar category-sidebar">
                        <h3 class="sidebar-title">categories</h3>
                        <h5 align="center"><a href="?url=product.php">> Click Here To See All Products <</a></h5>
                        <div class="sidebar-wrapper fix">
                            <!-- dropdown -->
                            <div class="products__dropdown">
                                <?php foreach($categories_type as $values): ?>
                                    <ul class="products__drop_btn btn dropdown-toggle product__cate" data-bs-toggle="dropdown"
                                    aria-expanded="false"><?php echo $values->type?></ul>
                                    <ul class="dropdown-menu">
                                        <?php foreach($categories as $value): ?>
                                            <?php if($values->id == $value->id_category_type) { ?>
                                                <li><a class="dropdown-item" href="?url=product.php&id_category=<?php echo $value->id?><?php if(isset($_GET['search'])) { echo '&search='.$search; } ?>"><?php echo $value->title_category?></a></li>
                                            <?php } ?>
                                        <?php endforeach ?>
                                    </ul>
                                <?php endforeach?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-9 col-xs-12 shop-products">
            <div class="shop-toolbar shop-toolbar-top fix">
                <div class="row" >
                    <div class="col-sm-3 col-xs-5 view-mode text-left product__head-column">
                        <a class="grid active" href="#grid-view" data-toggle="tab"><i
                                class="fa-sharp fa-solid fa-grid"></i></a>
                        <a class="list" href="#list-view" data-toggle="tab"><i class="fa-solid fa-list"></i></a>
                    </div>
                    <div class="col-sm-3 col-xs-7 pro-show text-right float-right product__head-column">
                        <div class="products__show_wrap">
                            <label>show:</label>
                            <select class="show-select">
                                <option>9</option>
                                <option>16</option>
                                <option>32</option>
                                <option>ALL</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12 short-by text-center product__head-column">
                        <div class="products__short_by_wrap">
                            <label>short by:</label>
                            <ul class="products__drop_btn btn dropdown-toggle product__sort-action" data-bs-toggle="dropdown"
                                    aria-expanded="false"><?php echo $order.' '.$action?></ul>
                            <ul class="dropdown-menu">
                                <li href="#"><a class="dropdown-item" href="?url=product.php<?php if(isset($_GET["id_category"])) { echo '&id_category='.$_GET["id_category"]; } ?><?php if(isset($_GET["page"])) { echo '&page='.$_GET["page"]; } ?><?php if(isset($_GET['search'])) { echo '&search='.$search; } ?>&order=name&action=asc">Name Ascending</a></li>
                                <li><a class="dropdown-item" href="?url=product.php<?php if(isset($_GET["id_category"])) { echo '&id_category='.$_GET["id_category"]; } ?><?php if(isset($_GET["page"])) { echo '&page='.$_GET["page"]; } ?><?php if(isset($_GET['search'])) { echo '&search='.$search; } ?>&order=name&action=desc">Name Descending</a></li>
                                <li><a class="dropdown-item" href="?url=product.php<?php if(isset($_GET["id_category"])) { echo '&id_category='.$_GET["id_category"]; } ?><?php if(isset($_GET["page"])) { echo '&page='.$_GET["page"]; } ?><?php if(isset($_GET['search'])) { echo '&search='.$search; } ?>&order=date_added&action=asc">Date Ascending</a></li>
                                <li><a class="dropdown-item" href="?url=product.php<?php if(isset($_GET["id_category"])) { echo '&id_category='.$_GET["id_category"]; } ?><?php if(isset($_GET["page"])) { echo '&page='.$_GET["page"]; } ?><?php if(isset($_GET['search'])) { echo '&search='.$search; } ?>&order=date_added&action=desc">Date Descending</a></li>
                                <li><a class="dropdown-item" href="?url=product.php<?php if(isset($_GET["id_category"])) { echo '&id_category='.$_GET["id_category"]; } ?><?php if(isset($_GET["page"])) { echo '&page='.$_GET["page"]; } ?><?php if(isset($_GET['search'])) { echo '&search='.$search; } ?>&order=price&action=asc">Price Ascending</a></li>
                                <li><a class="dropdown-item" href="?url=product.php<?php if(isset($_GET["id_category"])) { echo '&id_category='.$_GET["id_category"]; } ?><?php if(isset($_GET["page"])) { echo '&page='.$_GET["page"]; } ?><?php if(isset($_GET['search'])) { echo '&search='.$search; } ?>&order=price&action=desc">Price Descending</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="products__content row">
                <?php if($number_count > 0) { foreach($products as $value): ?>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="products__product-item">
                            <!-- Item Image + Action -->
                            <div class="products__wrap-item">
                                <!-- Item Image -->
                                <div class="products__item-image">
                                    <a href="?url=detail.php&id_product=<?php echo $value->id?>">
                                        <img src="admin/public/front-end/images/products/<?php echo $value->picture?>" alt="">
                                    </a>
                                </div>
                                <!-- View products -->
                                <a href="?url=detail.php&id_product=<?php echo $value->id?>" class="products__view-products">
                                    <i class="fa-regular fa-square-plus"></i>
                                </a>
                                <!-- Action -->
                                <div class="products__item-action">
                                    <a href="#"><button class="products__item-action-btn btn-icon">
                                            <i class="fa-solid fa-arrows-rotate"></i>
                                        </button></a>
                                    <a href="#"><button class="products__item-action-btn btn-text">
                                            add to bag
                                        </button></a>
                                    <a href="#"><button class="products__item-action-btn btn-icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </button></a>
                                </div>
                                <div class="products__sin_details fix">
                                    <a class="products__sin_title" href="?url=detail.php&id_product=<?php echo $value->id?>"><?php echo $value->name?></a>
                                    <!-- Product Price -->
                                    <div class="products__sin_price float-left">
                                        <span class="new">$ <?php echo $value->price?>.00</span>
                                    </div>
                                    <!-- Product Ratting -->
                                    <div class="products__sin_ratting float-right">
                                        <div class="rattings float-left">
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                        </div>
                                        <span>(<?php echo $value->view_number?>)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; } ?>
            </div>
            <div class="shop-toolbar shop-toolbar-bottom fix">
                <div class="row">
                    <div class="col-lg-4 col-sm-2 col-xs-3 view-mode text-left">
                        <a class="grid active" href="#grid-view" data-toggle="tab"><i class="zmdi zmdi-apps"></i></a>
                        <a class="list" href="#list-view" data-toggle="tab"><i class="zmdi zmdi-storage"></i></a>
                    </div>
                    <div class="col-lg-4 col-sm-5 col-xs-12 pagination text-center">
                    <ul class="pagination pb-3 d-flex justify-content-center">
                            <?php for ($i = 1; $i <= $number_page; $i++) { ?>
                                <li class="<?php if(isset($_GET["page"]) && $_GET['page'] == $i) { echo 'active'; }?>">
                                    <a class="page-link fs-3 px-3 text-danger mx-1"
                                        href="?url=product.php<?php if(isset($_GET["id_category"])) { echo '&id_category='.$_GET["id_category"]; } ?>&page=<?php echo $i; ?><?php if(isset($_GET['search'])) { echo '&search='.$search; } ?><?php if(isset($_GET["order"]) && isset($_GET["action"])) { echo '&order='.$_GET['order'].'&action='.$_GET['action']; }?>">
                                        <?php echo $i ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-sm-5 col-xs-9 short-by text-right float-right">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
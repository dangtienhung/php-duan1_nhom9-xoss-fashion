<div class="index__container">
    <div class="index__banner-list">
        <div class="index__banner-item">
            <!-- <img src="./images/slider/3.jpg" alt=""> -->
            <div class="index__banner-body">
                <h1 class="index__banner-title">XOSS SHOP</h1>
                <h1 class="index__banner-desc">
                    <p>WOMEN’S NEW FASHION</p>
                    <span>SEE OUR FULL COLLECTION.S SUMMER 2016 LOOKBOOK</span>
                </h1>
                <a href="#" class="index__banner-btn">Shop now</a>
            </div>
        </div>
    </div>
    <div class="container-fluid index__shipping">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="index__shipping-item">
                    <div class="icon">
                        <i class="fa-solid fa-car"></i>
                    </div>
                    <div class="index__shipping-body">
                        <h2>Free shipping</h2>
                        <p>Lorem ipsum dummy text goes here</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="index__shipping-item">
                    <div class="icon">
                        <i class="fa-solid fa-car"></i>
                    </div>
                    <div class="index__shipping-body">
                        <h2>WALLET</h2>
                        <p>Lorem ipsum dummy text goes here</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="index__shipping-item">
                    <div class="icon">
                        <i class="fa-solid fa-car"></i>
                    </div>
                    <div class="index__shipping-body">
                        <h2>SAFE SHOPPING</h2>
                        <p>Lorem ipsum dummy text goes here</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="index__shipping-item">
                    <div class="icon">
                        <i class="fa-solid fa-car"></i>
                    </div>
                    <div class="index__shipping-body">
                        <h2>ONLINE SUPPORT</h2>
                        <p>Lorem ipsum dummy text goes here</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- feature product -->
<div class="featured__container">
    <h1 class="title">Sản phẩm nổi bật</h1>
    <div class="container">
        <div class="row">
            <?php foreach($featured_products as $value):?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="item__product">
                        <a href="?url=detail.php&id_product=<?php echo $value->id?>">
                            <div class="item__product-head">
                                <img src="public/layout/images/product/<?php echo $value->picture?>" alt="">
                                <div class="item__controll-btn">
                                    <a href="#" class="item__btn-buy">Mua ngay</a>
                                    <a href="#" class="item__btn-cart">Giỏ hàng</a>
                                </div>
                            </div>
                            <div class="item__product-body">
                                <h2><?php echo $value->name?></h2>
                                <h3><?php echo number_format($value->price)?></h3>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach?>
        </div>
    </div>
</div>

<!-- banner -->
<div class="banner__wrapper featured__container">
    <div class="banner__item">
        <img src="public/layout/images/banner/promo-1.jpg" alt="">
        <div class="banner__item-desc">
            <h2>Lastest<br />Backpack</h2>
        </div>
    </div>
    <div class="banner__primary">
        <img src="public/layout/images/banner/promo-2.jpg" alt="">
        <div class="banner__primary-desc">
            <h2>Giảm giá 40%</h2>
            <h3>Phong cách mới</h3>
        </div>
    </div>
    <div class="banner__item">
        <img src="public/layout/images/banner/promo-3.jpg" alt="">
        <div class="banner__item-desc">
            <h2>Lastest<br />Backpack</h2>
        </div>
    </div>
</div>

<!-- lastest product -->
<div class="featured__container">
    <h1 class="title">Sản phẩm mới nhất</h1>
    <div class="container">
        <div class="row">
            <?php foreach($new_products as $value): ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="item__product">
                        <a href="?url=detail.php&id_product=<?php echo $value->id?>">
                            <div class="item__product-head">
                                <img src="public/layout/images/product/<?php echo $value->picture?>" alt="">
                                <div class="item__controll-btn">
                                    <a href="#" class="item__btn-buy">Mua ngay</a>
                                    <a href="#" class="item__btn-cart">Giỏi hàng</a>
                                </div>
                            </div>
                            <div class="item__product-body">
                                <h3><?php echo $value->name?></h3>
                                <h3>$ <?php echo number_format($value->price)?></h3>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach?>
            <!-- end -->
        </div>
    </div>
</div>
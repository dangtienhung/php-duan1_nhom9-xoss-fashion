<div class="detail__container">
    <div class="detail__wrap-box">
        <!-- Detail Product -->
        <div class="detail__product-view">
            <!-- Product Image -->
            <div class="detail__product-image">
                <img src="public/layout/images/product/<?php echo $detail_product->picture?>" alt="">
            </div>
            <!-- Product Content -->
            <div class="detail__product-content">
                <!-- Product Title -->
                <a href="#" class="detail__product-title"><?php echo $detail_product->name?></a>
                <!-- Product Price -->
                <div class="detail__product-price">
                    <div class="detail__product-wrap-price">
                        <!-- New Price -->
                        <span class="detail__product-price-new">
                            $ <?php if(number_format($detail_product->saleOff) == 0) {
                                echo $detail_product->price;
                            } else {
                                $new_price = $detail_product->price * ($detail_product->saleOff/100);
                                echo $new_price;
                            }
                            ?>.00
                        </span>
                        <!-- Old Price -->
                        <span class="detail__product-price-old">(
                            <?php if(number_format($detail_product->saleOff) != 0) {
                                echo $detail_product->price;
                            }  ?>
                            )</span>
                    </div>
                </div>
                <!-- Product Overview -->
                <div class="detail__product-overview">
                    <h5>overview:</h5>
                    <p><?php echo $detail_product->description?></p>
                </div>
                <!-- Product Size -->
                <div class="detail__product-size">
                    <h5>Size:</h5>
                    <a href="#">S</a>
                    <a href="#">M</a>
                    <a href="#">L</a>
                    <a href="#">XL</a>
                    <a href="#">XXL</a>
                </div>
                <!-- Product Color + Quantity -->
                <form action="#" method="POST">
                    <div class="detail__product-color-quantity">
                        <!-- Color -->
                        <div class="detail__product-color">
                            <h5>COLOR:</h5>
                            <div class="detail__product-wrap-color">
                                <a style="background-color: rgba(255, 172, 154, 1);" href="#"
                                    class="detail__product-color-active">color 1</a>
                                <a style="background-color: rgba(255, 64, 129, 1);" href="#">color 2</a>
                                <a style="background-color: rgb(0, 0, 0);"" href=" #">color 3</a>
                            </div>
                        </div>
                        <!-- Product Quantity -->
                        <div class="detail__product-quantity">
                            <h5>QUANTITY:</h5>
                            <div class="detail__product-wrap-quantity">
                                <!-- Input Quantity -->
                                <input type="text" value="0" name="quantity" class="detail_product-input-plus-minus">

                                <!-- Increase -->
                                <span class="detail__product-inc btnqty">
                                    <i class="fa-solid fa-chevron-up"></i>
                                </span>

                                <!-- Decrease -->
                                <span class="detail__product-dec btnqty">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Product Action -->
                    <div class="detail__product-action">
                        <button name="btn_add" class="detail__product-action-btn btn-text">ADD TO BAG</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Reviews + Description -->
        <div class="detail__reviews-description">
            <!-- Tab list -->
            <ul class="detail__tablist-container">
                <li class="active">
                    <a href="#">Reviews</a>
                </li>
                <li>
                    <a href="#">Description</a>
                </li>
            </ul>

            <!-- Reviews -->
            <div class="detail__reviews">
                <div class="detail__product-avg-ratting">
                    <h4>4.5 <span>(overall)</span></h4>
                    <span>Based on <?php echo count($comments)?> Comments</span>
                </div>
                <!-- View Comment -->
                <div class="detail__product-comment-box">
                    <?php foreach($comments as $value): ?>
                    <!-- Item -->
                    <div class="detail__product-comment-view">
                        <div class="detail__product-comment-view-info">
                            <div class="detail__product-comment-author">
                                <span><?php echo $value->name_customer?></span>
                            </div>
                            <div class="detail__product-comment-time">
                                <span><?php echo $value->time_comment?></span>
                                <span><?php echo $value->date_comment?></span>
                            </div>
                        </div>
                        <p class="detail__product-comment-view-title">
                            <?php echo $value->comment_content?>
                        </p>
                    </div>
                    <?php endforeach?>
                </div>
                <!-- Form Comment -->
                <div class="detail__comment-form-wrap-box">
                    <h3>ADD YOUR COMMENTS</h3>
                    <form action="" method="POST" class="detail__comment-form-action">
                        <!-- Imput Name -->
                        <div class="input-name-box">
                            <label for="name">Name:</label>
                            <input type="text" name="name" value="" placeholder="Type your name">
                        </div>
                        <!-- Input Email -->
                        <div class="input-email-box">
                            <label for="email">Email:</label>
                            <input type="email" name="email" value="" placeholder="Type your email address">
                        </div>
                        <!-- Textarea Comment -->
                        <div class="input-comment-box">
                            <label for="comment">Your comment:</label>
                            <textarea name="comment" id="" cols="30" rows="10" placeholder="White a comment"></textarea>
                        </div>
                        <!-- Button Submit -->
                        <div class="input-btnsubmit-box">
                            <button type="submit" name="btn_submit">ADD COMMENT</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Description -->
            <div class="detail__description">
                <!-- Title -->
                <p>
                    <?php echo $detail_product->description?>
                </p>
            </div>
        </div>
    </div>
    <!-- Suggested Products -->
    <div class="detail__suggested-products">
        <div class="detail__wrap-box">
            <h1>SUGGESTED PODUCTS</h1>
            <!-- Slider Product -->
            <div class="detail__product-slider">
                <?php foreach($suggested_products as $value): ?>
                <!-- Item -->
                <div class="detail__product-item">
                    <!-- Item Image + Action -->
                    <div class="detail__wrap-item">
                        <!-- Item Image -->
                        <div class="detail__item-image">
                            <a href="?url=detail.php&id_product=<?php echo $value->id?>">
                                <img src="public/layout/images/product/<?php echo $value->picture?>" alt="">
                            </a>
                        </div>
                        <!-- Item new -->
                        <!-- <span>new</span> -->
                        <!-- View Detail -->
                        <a href="?url=detail.php&id_product=<?php echo $value->id?>" class="detail__view-detail">
                            <i class="fa-regular fa-square-plus"></i>
                        </a>
                        <!-- Action -->
                        <div class="detail__item-action">
                            <a href="#"><button class="detail__item-action-btn btn-icon">
                                    <i class="fa-solid fa-arrows-rotate"></i>
                                </button></a>
                            <a href="#"><button class="detail__item-action-btn btn-text">
                                    add to bag
                                </button></a>
                            <a href="#"><button class="detail__item-action-btn btn-icon">
                                    <i class="fa-regular fa-heart"></i>
                                </button></a>
                        </div>
                    </div>
                    <!-- Detail Item -->
                    <div class="detail__item-detail">
                        <!-- Item title -->
                        <a href="?url=detail.php&id_product=<?php echo $value->id?>" class="detail__item-title">
                            <?php echo $value->name?>
                        </a>
                        <!-- New Price -->
                        <span class="detail__item-price new">
                            $ <?php if(number_format($value->saleOff) == 0) {
                                echo $value->price;
                            } else {
                                $new_price_sg = $value->price * ($value->saleOff/100);
                                echo $new_price_sg;
                            }
                            ?>.00
                        </span>
                        <!-- Old Price -->
                        <span class="detail__item-price old">(
                            <?php if(number_format($value->saleOff) != 0) {
                                echo $value->price;
                            }  ?>
                        )</span>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
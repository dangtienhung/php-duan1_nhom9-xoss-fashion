<div class="cart__container">
    <div class="cart__menu cart__page-breadcrumb bg-off-white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="cart__breadcrumbs">
                        <li><a href="?url=home">home</a></li>
                        <li><span>shopping cart</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart__Page -->
    <div class="cart__page bg-off-white padding-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table cart__table text-center">
                            <thead>
                                <tr>
                                    <th class="number">#</th>
                                    <th class="image">image</th>
                                    <th class="name">product name</th>
                                    <th class="qty">quantity</th>
                                    <th class="price">price</th>
                                    <th class="total">total</th>
                                    <th class="remove">remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($_SESSION['carts'])) { ?>
                                    <?php $i=1;$results=0; foreach($_SESSION['carts'] as $value): ?>
                                        <tr>
                                            <td><span class="cart__number"><?php echo $i++;?></span></td>
                                            <td><a href="#" class="cart__pro-image"><img src="admin/public/front-end/images/products/<?php echo $value['picture']?>"
                                                        alt=""/></a></td>
                                            <td><a href="#" class="cart__pro-title"><?php echo $value['name']?></a></td>
                                            <td>
                                                <div class="cart__pro-qua">
                                                    <select>
                                                        <option value="<?php echo $value['quantity']?>"><?php echo $value['quantity']?></option>
                                                        <?php for($index = 1; $index <= $value['max_quantity']; $index++) {
                                                            if($index != $value['quantity']) {
                                                                echo '<option value="'.$index.'">'.$index.'</option>';
                                                            }
                                                        }?>    
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="cart__pro-price">$ <?php echo $value['price']?>.00</p>
                                            </td>
                                            <td>
                                                <p class="cart__pro-total">$ <?php $total = $value['price']*$value['quantity']; echo $total; ?>.00</p>
                                            </td>
                                            <td><a href="?url=delete_item_from_cart&id_product=<?php echo $value['id']?>"><button class="cart__pro-remove">Xóa</button></a>
                                            </td>
                                        </tr>
                                        <?php $results = $results + $total?>
                                    <?php endforeach?>
                                <?php } else { ?>
                                    <tr align='center'>
                                        <td  style='padding: 40px 0;' colspan="7"><h2>Giỏ hàng trống</h2></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-xs-12 cart__actions cart__button-cuppon">
                            <div class="cart__action float-left">
                                <a href="#" class="button color-hover">continiue shopping</a>
                            </div>
                            <div class="cart__cuppon-wrap float-right">
                                <h4>DISCOUNT CODES</h4>
                                <p>Enter your coupon code if you have</p>
                                <form action="#" class="cart__cuppon-form ">
                                    <input type="text" />
                                    <button class="button color-hover">apply coupon</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 cart__checkout-process text-right">
                            <div class="wrap">
                                <p><span>Subtotal</span><span>$ <?php echo $results?>.00</span></p>
                                <!-- <h4><span>Grand total</span><span>$190.98</span></h4> -->
                                <button class="button color-hover">process to checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_COOKIE['nofication'])) {
        echo '<script>alert("'.$_COOKIE['nofication'].'")</script>';
    }
?>
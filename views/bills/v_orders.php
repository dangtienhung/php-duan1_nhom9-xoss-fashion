<div class="order__container">
    <div class='order__btn'>
        <a href="?url=info.php&checkbill="><button>Quay Lại</button></a>
        <span>Thông Tin Hóa Đơn</span>
    </div>
    <div class="order_wrap-box table-responsive">
        <table >
            <thead>
                <tr>
                    <td>#</td>
                    <td>Ảnh</td>
                    <td>Tên</td>
                    <td>Số lượng</td>
                    <td>giá</td>
                    <td>Tổng tiền</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $key => $value): ?>
                    <tr>
                        <td><?php echo $key + 1?></td>
                        <td><img src="admin/public/front-end/images/products/<?php echo $value->picture?>" alt=""></td>
                        <td><?php echo $value->name_product?></td>
                        <td><?php echo $value->quantity?></td>
                        <td>$ <?php echo $value->price?>.00</td>
                        <td>$ <?php echo $value->total?>.00</td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="order__total">
        <h2>Tổng tiền thanh toán: $ <?php echo $orders[0]->total_price?>.00</h2>
    </div>
</div>
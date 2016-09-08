<style>
    table.cart-table input[type="text"] {
        background: none repeat scroll 0 0 #f5f5f5;
        margin-left: 0;
        padding: 8px 9px;
        float: left;
        height: 22px;
        text-align: center;
        width: 25px;
    }
</style>

<div class="container">
    <div class="sixteen columns">
        <!-- Cart -->
        <table class="cart-table responsive-table">
            <tr>
                <th></th>
                <th>Товар</th>
                <th>Цена</th>
                <th>Кол-во</th>
                <th>Сумма</th>
                <th></th>
            </tr>

            <?php $sum = 0;?>
            <?php foreach ($basket as $obj) : ?>
                <tr>
                    <td><?php echo $obj->product->getPictureLink(); ?></td>

                    <td class="cart-title">
                        <a href="/product/view/<?php echo $obj->product_id; ?>"><?php echo $obj->product->name; ?></a>
                    </td>

                    <td><?php echo NumberFormat::get($obj->single_price); ?></td>

                    <td>
                        <div class="qtyminus"></div>
                        <input class="qty" type="text" value="<?php echo $obj->quantity; ?>" name="quantity"
                               maxlength="3" onchange="basketObj.changeCount($(this));"
                               data-id="<?php echo $obj->id; ?>" />
                        <div class="qtyplus"></div>
                    </td>
                    <td><?php echo NumberFormat::get($obj->price); ?> руб.</td>

                    <td><a href="javascript:;" class="cart-remove"
                           onclick="basketObj.deleteFromBasket($(this))"
                            data-id="<?php echo $obj->id; ?>"></a></td>
                </tr>
                <?php $sum += $obj->price; ?>
            <?php endforeach; ?>

            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th class="cart-sum"><?php echo NumberFormat::get($sum); ?> руб.</th>
                <th></th>
            </tr>
        </table>

        <table class="cart-table bottom">
            <tbody>
            <tr>
                <th>
                    <div class="cart-btns">
                        <a href="#order-dialog" class="popup-with-zoom-anim button color margin-left-0">
                            Оформить заказ</a>
                        <?php
                        if (Yii::app()->user->isGuest){
                            $this->renderPartial('order');
                        } else {
                            $this->renderPartial('orderNotGuest');
                        }
                        ?>
                    </div>
                </th>
            </tr>

            </tbody>
        </table>
    </div>
</div>

<div class="margin-top-15"></div>
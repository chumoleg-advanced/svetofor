<table class="cart-table responsive-table" id="tableProducts">
    <tr>
        <th>ID товара</th>
        <th>Название</th>
        <th>Цена</th>
        <th>Кол-во</th>
        <th>Сумма</th>
        <th></th>
    </tr>

    <?php $sum = 0; ?>
    <?php foreach ($model->relOrderProducts as $obj) : ?>
        <tr>
            <td><?php echo $obj->product_id; ?></td>
            <td class="cart-title"><?php echo $obj->product->name; ?></td>
            <td><?php echo NumberFormat::get($obj->price); ?></td>
            <td><?php echo CHtml::textField('orderProdQuantity', $obj->quantity,
                    array('class'    => 'qty productCounter', 'style' => 'min-width: 50px; margin-top: 5px;',
                          'onchange' => 'orderObj.changeProdCount($(this))',
                          'data-id'  => $obj->id
                    )); ?></td>
            <td><?php echo NumberFormat::get($obj->price * $obj->quantity); ?> руб.</td>
            <td><?php echo CHtml::link('Удалить', 'javascript:;',
                    array('onclick' => 'orderObj.deleteProduct($(this))', 'data-id' => $obj->id))?></td>
        </tr>
    <?php endforeach; ?>

    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th class="cart-sum"><?php echo NumberFormat::get($model->price); ?> руб.</th>
        <th></th>
    </tr>
</table>
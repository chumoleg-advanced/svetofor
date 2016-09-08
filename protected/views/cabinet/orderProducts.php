<table class="cart-table responsive-table" id="tableProducts">
    <tr>
        <th>Название товара</th>
        <th>Цена</th>
        <th>Кол-во</th>
        <th>Сумма</th>
    </tr>

    <?php $sum = 0; ?>
    <?php foreach ($model->relOrderProducts as $obj) : ?>
        <tr>
            <td class="cart-title"><?php echo $obj->product->name; ?></td>
            <td><?php echo NumberFormat::get($obj->price); ?></td>
            <td><?php echo $obj->quantity; ?></td>
            <td><?php echo NumberFormat::get($obj->price * $obj->quantity); ?> руб.</td>
        </tr>
    <?php endforeach; ?>

    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th class="cart-sum"><?php echo NumberFormat::get($model->price); ?> руб.</th>
    </tr>
</table>
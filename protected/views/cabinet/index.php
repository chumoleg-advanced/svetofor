<div class="container margin-bottom-40">
    <div class="sixteen columns">
        <a href="/cabinet/index" class="button color">Мой профиль</a>
        <a href="/cabinet/orders" class="button color">Мои заказы</a>

        <div class="clearfix">&nbsp;</div>
        <?php $model = $this->model; ?>
        <table class="cart-table responsive-table">
            <tr>
                <td>Email</td>
                <td><?php echo $model->email; ?></td>
            </tr>
            <tr>
                <td>ФИО</td>
                <td><?php echo $model->fio; ?></td>
            </tr>
            <tr>
                <td>Телефон</td>
                <td><?php echo $model->phone; ?></td>
            </tr>
            <tr>
                <td>Область</td>
                <td><?php echo $model->area; ?></td>
            </tr>
            <tr>
                <td>Город</td>
                <td><?php echo $model->city; ?></td>
            </tr>
            <tr>
                <td>Адрес</td>
                <td><?php echo $model->address; ?></td>
            </tr>
        </table>
    </div>
</div>
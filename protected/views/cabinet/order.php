<div class="container margin-bottom-20">
    <a href="/cabinet/orders" class="button color">Вернуться к списку</a>

    <div class="clearfix">&nbsp;</div>

    <div class="eleven columns">
        <div class="five columns">
            <h3>Статус</h3>
            <?php echo Order::getStatus($model->status); ?>
        </div>

        <div class="five columns">
            <h3>Дата создания</h3>
            <?php echo $model->date_create; ?>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>
    <div class="clearfix">&nbsp;</div>
    <div class="sixteen columns margin-bottom-20">
        <?php $this->renderPartial('orderProducts', array('model' => $model)); ?>
    </div>
</div>
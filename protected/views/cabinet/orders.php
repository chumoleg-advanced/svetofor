<div class="container">
    <div class="sixteen columns">
        <a href="/cabinet/index" class="button color">Мой профиль</a>
        <a href="/cabinet/orders" class="button color">Мои заказы</a>

        <?php
        $this->widget(
            'zii.widgets.grid.CGridView', array(
                'id'           => 'order-grid',
                'dataProvider' => $this->orderDataProvider,
                'filter'       => $this->orderModel,
                'ajaxUpdate'   => true,

                'columns'      => array(
                    array(
                        'name'  => 'id',
                        'value' => 'CHtml::link($data->id, "/cabinet/order/" . $data->id)',
                        'type'  => 'raw'
                    ),
                    array(
                        'name'  => 'date_create',
                        'value' => 'CHtml::link($data->date_create, "/cabinet/order/" . $data->id)',
                        'type'  => 'raw'
                    ),
                    array(
                        'name'   => 'status',
                        'filter' => Order::getStatus(),
                        'value'  => 'Order::getStatus($data->status)'
                    ),
                    'price',
                )
            )
        );
        ?>
    </div>
</div>
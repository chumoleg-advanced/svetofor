<?php
$this->widget(
    'zii.widgets.grid.CGridView', array(
        'id'           => 'order-grid',
        'dataProvider' => $dataProvider,
        'filter'       => $model,
        'ajaxUpdate'   => false,

        'columns'      => array(
            array(
                'name'  => 'id',
                'value' => 'CHtml::link($data->id, "/siteAdmin/order/update/" . $data->id)',
                'type'  => 'raw'
            ),
            array(
                'name'  => 'date_create',
                'value' => 'CHtml::link($data->date_create, "/siteAdmin/order/update/" . $data->id)',
                'type'  => 'raw'
            ),
            array(
                'name'   => 'status',
                'filter' => Order::getStatus(),
                'value'  => 'Order::getStatus($data->status)'
            ),
            array(
                'name'  => 'fio',
                'value' => '$data->fio'
            ),
            array(
                'name'  => 'phone',
                'value' => '$data->phone'
            ),
            'price',
            [
                'class'    => 'MyButtonColumn',
                'template' => '{update}',
            ]
        )
    )
);
<?php
$this->widget(
    'zii.widgets.grid.CGridView', [
        'id'           => 'order-grid',
        'dataProvider' => $dataProvider,
        'filter'       => $model,
        'ajaxUpdate'   => false,
        'columns'      => [
            'id',
            'date_create',
            [
                'name'   => 'status',
                'filter' => Order::getStatus(),
                'value'  => 'Order::getStatus($data->status)'
            ],
            [
                'name'  => 'fio',
                'value' => '$data->fio'
            ],
            [
                'name'  => 'phone',
                'value' => '$data->phone'
            ],
            'price',
            [
                'class'    => 'MyButtonColumn',
                'template' => '{update}',
            ]
        ]
    ]
);
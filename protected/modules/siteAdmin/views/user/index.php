<?php
$this->widget(
    'zii.widgets.grid.CGridView', [
        'id'           => 'user-grid',
        'dataProvider' => $dataProvider,
        'filter'       => $model,
        'ajaxUpdate'   => false,
        'columns'      => [
            'id',
            [
                'name'  => 'email',
                'value' => 'CHtml::link($data->email, "/siteAdmin/user/update/" . $data->id)',
                'type'  => 'raw'
            ],
            'fio',
            'phone',
            [
                'name'   => 'status',
                'filter' => User::getStatus(),
                'value'  => 'User::getStatus($data->status)'
            ],
            [
                'class'    => 'MyButtonColumn',
                'template' => '{update}',
            ]
        ]
    ]
);
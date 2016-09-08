<?php
$this->widget(
    'zii.widgets.grid.CGridView', array(
        'id'           => 'user-grid',
        'dataProvider' => $dataProvider,
        'filter'       => $model,
        'ajaxUpdate'   => false,

        'columns'      => array(
            'id',
            array(
                'name'  => 'email',
                'value' => 'CHtml::link($data->email, "/siteAdmin/user/update/" . $data->id)',
                'type'  => 'raw'
            ),
            'fio',
            'phone',
            array(
                'name'   => 'status',
                'filter' => User::getStatus(),
                'value'  => 'User::getStatus($data->status)'
            ),
        )
    )
);
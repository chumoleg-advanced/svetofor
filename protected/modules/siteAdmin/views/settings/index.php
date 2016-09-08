<?php
$this->widget(
    'zii.widgets.grid.CGridView', [
        'id'           => 'settings-grid',
        'dataProvider' => $dataProvider,
        'filter'       => $model,
        'ajaxUpdate'   => false,
        'columns'      => [
            'id',
            'name',
            [
                'class'    => 'MyButtonColumn',
                'template' => '{update}',
            ]
        ]
    ]
);
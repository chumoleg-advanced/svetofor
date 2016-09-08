<a href="/siteAdmin/carModel/create" class="button color">Добавить новую модель автомобиля</a>

<?php
$this->widget(
    'zii.widgets.grid.CGridView', [
        'id'           => 'car-model-grid',
        'dataProvider' => $dataProvider,
        'filter'       => $model,
        'ajaxUpdate'   => false,
        'columns'      => [
            'id',
            'name',
            [
                'class' => 'MyButtonColumn'
            ]
        ],
    ]
);

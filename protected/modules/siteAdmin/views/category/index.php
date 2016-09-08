<a href="/siteAdmin/category/create" class="button color">Добавить новую категорию</a>

<?php
FancyBox::activate();

$this->widget(
    'zii.widgets.grid.CGridView', [
        'id'           => 'category-grid',
        'dataProvider' => $dataProvider,
        'filter'       => $model,
        'ajaxUpdate'   => false,
        'columns'      => [
            'id',
            [
                'name'        => 'picture',
                'value'       => '$data->getPicture()',
                'type'        => 'raw',
                'htmlOptions' => [
                    'style' => 'text-align: center; padding: 5px;width:100px;'
                ]
            ],
            'name',
            [
                'name'   => 'status',
                'filter' => MyActiveRecord::getStatus(),
                'value'  => 'MyActiveRecord::getStatus($data->status)'
            ],
            [
                'class'    => 'MyButtonColumn',
                'template' => '{update}',
            ]
        ],
    ]
);
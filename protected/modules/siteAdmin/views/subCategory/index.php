<a href="/siteAdmin/subCategory/create" class="button color">Добавить новую подкатегорию</a>

<?php
$this->widget(
    'zii.widgets.grid.CGridView', [
        'id'           => 'sub-category-grid',
        'dataProvider' => $dataProvider,
        'filter'       => $model,
        'ajaxUpdate'   => false,
        'columns'      => [
            'id',
            'name',
            [
                'name'   => 'status',
                'filter' => MyActiveRecord::getStatus(),
                'value'  => 'MyActiveRecord::getStatus($data->status)'
            ],
            [
                'name'   => 'category_id',
                'value'  => 'CHtml::value($data, "category.name")',
                'filter' => Category::model()->getList()
            ],
            [
                'class'    => 'MyButtonColumn',
                'template' => '{update}',
            ]
        ],
    ]
);
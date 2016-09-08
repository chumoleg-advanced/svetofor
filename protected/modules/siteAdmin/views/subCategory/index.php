<a href="/siteAdmin/subCategory/create" class="button color">Добавить новую подкатегорию</a>

<?php
$this->widget(
    'zii.widgets.grid.CGridView', array(
        'id'           => 'sub-category-grid',
        'dataProvider' => $dataProvider,
        'filter'       => $model,
        'ajaxUpdate'   => false,

        'columns'      => array(
            'id',
            array(
                'name'  => 'name',
                'value' => 'CHtml::link($data->name, "/siteAdmin/subCategory/update/" . $data->id)',
                'type'  => 'raw'
            ),
            array(
                'name'   => 'status',
                'filter' => MyActiveRecord::getStatus(),
                'value'  => 'MyActiveRecord::getStatus($data->status)'
            ),
            array(
                'name'   => 'category_id',
                'value'  => '!empty($data->category) ? $data->category->name : ""',
                'filter' => Category::model()->getList()
            ),
            array(
                'class' => 'MyButtonColumn'
            )
        ),
    )
);
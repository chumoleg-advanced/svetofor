<a href="/siteAdmin/producer/create" class="button color">Добавить нового производителя</a>

<?php
$this->widget(
    'zii.widgets.grid.CGridView', array(
        'id'           => 'producer-grid',
        'dataProvider' => $dataProvider,
        'filter'       => $model,
        'ajaxUpdate'   => false,

        'columns'      => array(
            'id',
            array(
                'name'  => 'name',
                'value' => 'CHtml::link($data->name, "/siteAdmin/producer/update/" . $data->id)',
                'type'  => 'raw'
            ),
            array(
                'name'   => 'category_id',
                'value'  => 'CHtml::value($data, "category.name")',
                'filter' => Category::model()->getList()
            ),
            array(
                'name'   => 'status',
                'filter' => MyActiveRecord::getStatus(),
                'value'  => 'MyActiveRecord::getStatus($data->status)'
            ),
            array(
                'class' => 'MyButtonColumn'
            )
        ),
    )
);
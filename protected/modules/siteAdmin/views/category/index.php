<a href="/siteAdmin/category/create" class="button color">Добавить новую категорию</a>

<?php
FancyBox::activate();

$this->widget(
    'zii.widgets.grid.CGridView', array(
        'id'           => 'category-grid',
        'dataProvider' => $dataProvider,
        'filter'       => $model,
        'ajaxUpdate'   => false,

        'columns'      => array(
            'id',
            array(
                'name'        => 'picture',
                'value'       => '$data->getPicture()',
                'type'        => 'raw',
                'htmlOptions' => array(
                    'style' => 'text-align: center; padding: 5px;width:100px;'
                )
            ),
            array(
                'name'  => 'name',
                'value' => 'CHtml::link($data->name, "/siteAdmin/category/update/" . $data->id)',
                'type'  => 'raw'
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
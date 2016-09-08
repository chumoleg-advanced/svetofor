<a href="/siteAdmin/carModel/create" class="button color">Добавить новую модель автомобиля</a>

<?php
$this->widget(
    'zii.widgets.grid.CGridView', array(
        'id'           => 'car-model-grid',
        'dataProvider' => $dataProvider,
        'filter'       => $model,
        'ajaxUpdate'   => false,

        'columns'      => array(
            'id',
            array(
                'name'  => 'name',
                'value' => 'CHtml::link($data->name, "/siteAdmin/carModel/update/" . $data->id)',
                'type'  => 'raw'
            ),
            array(
                'class' => 'MyButtonColumn'
            )
        ),
    )
);

<?php
$this->widget(
    'zii.widgets.grid.CGridView', array(
        'id'           => 'settings-grid',
        'dataProvider' => $dataProvider,
        'filter'       => $model,
        'ajaxUpdate'   => false,

        'columns'      => array(
            'id',
            array(
                'name'  => 'name',
                'value' => 'CHtml::link($data->name, "/siteAdmin/settings/update/" . $data->id)',
                'type'  => 'raw'
            )
        )
    )
);
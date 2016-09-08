<a href="/siteAdmin/product/create" class="button color">Добавить новый товар</a>

<?php
FancyBox::activate();

$this->widget(
    'zii.widgets.grid.CGridView', array(
        'id'           => 'product-grid',
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
            'name',
            'article',
            array(
                'name'   => 'category_id',
                'value'  => 'CHtml::value($data, "category.name")',
                'filter' => Category::model()->getList()
            ),
            array(
                'name'   => 'status',
                'value'  => 'Product::getStatus($data->status)',
                'filter' => Product::getStatus()
            ),
            [
                'class'    => 'MyButtonColumn',
            ]
        ),
    )
);

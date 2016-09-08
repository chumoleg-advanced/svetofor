<div class="container margin-bottom-20">
    <div class="sixteen columns">
        <h3 class="headline"><?php echo $categoryName; ?></h3>
        <span class="line margin-bottom-10"></span>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="margin-bottom-40">
        <?php $this->renderPartial('//product/_search', array(
            'model' => $model, 'producer' => $producer, 'subCategory' => $subCategory)); ?>
    </div>

    <?php
    FancyBox::activate();

    $this->widget(
        'zii.widgets.grid.CGridView', array(
            'id'           => 'product-grid',
            'dataProvider' => $data,
            'ajaxUpdate'   => false,

            'columns'      => array(
                array(
                    'name'              => 'picture',
                    'value'             => '$data->getPictureLink()',
                    'type'              => 'raw',
                    'htmlOptions'       => array(
                        'style' => 'text-align: center; padding: 5px;width:100px;'
                    ),
                    'headerHtmlOptions' => array(
                        'style' => 'display:none;'
                    ),
                    'filterHtmlOptions' => array(
                        'style' => 'display:none;'
                    ),
                ),
                array(
                    'name'              => 'name',
                    'value'             => '$data->name',
                    'htmlOptions'       => array(
                        'style' => 'width:35%'
                    ),
                    'headerHtmlOptions' => array(
                        'style' => 'display:none;'
                    ),
                    'filterHtmlOptions' => array(
                        'style' => 'display:none;'
                    ),
                ),
                array(
                    'header'            => 'ОЕМ',
                    'value'             => '$data->article',
                    'headerHtmlOptions' => array(
                        'style' => 'display:none;'
                    ),
                    'filterHtmlOptions' => array(
                        'style' => 'display:none;'
                    ),
                ),
                array(
                    'header'            => '',
                    'value'             => '$data->getPrice() . " руб."',
                    'headerHtmlOptions' => array(
                        'style' => 'display:none;'
                    ),
                    'filterHtmlOptions' => array(
                        'style' => 'display:none;'
                    ),
                ),
                array(
                    'header'            => '',
                    'value'             => '$data->getLinkAddBasket()',
                    'type'              => 'raw',
                    'htmlOptions'       => array(
                        'style' => 'width:10%;',
                        'align' => 'center'
                    ),
                    'headerHtmlOptions' => array(
                        'style' => 'display:none;'
                    ),
                    'filterHtmlOptions' => array(
                        'style' => 'display:none;'
                    ),
                ),
            )
        )
    );
    ?>
</div>
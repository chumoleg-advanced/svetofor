<?php
FancyBox::activate();

$this->widget('zii.widgets.CListView', [
    'id'            => 'list-view-product-image',
    'dataProvider'  => $dataProvider,
    'template'      => "{summary}{pager}<div>&nbsp;</div>
        <div class='container margin-bottom-20'>{items}</div>{pager}",
    'itemView'      => '_item',
    'itemsCssClass' => 'portfolio-wrapper products',
    'ajaxUpdate'    => false
]);
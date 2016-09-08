<script src="/js/order.js"></script>

<a href="javascript:;" class="button color" onclick="$('form').submit();">Сохранить</a>
<a href="/siteAdmin/order/index" class="button color">Вернуться к списку</a>

<div class="clearfix">&nbsp;</div>

<?php
/* @var CActiveForm $form */
/* @var Order $model */
$form = $this->beginWidget('CActiveForm', array(
    'id'                   => 'order-form',
    'errorMessageCssClass' => 'text-error',
    'htmlOptions'          => array(
        'class' => 'add-comment'
    ),
));
?>

<?php echo CHtml::hiddenField('orderId', $model->id); ?>

<div class="text-error"><?php echo $form->errorSummary($model); ?></div>

<fieldset>
    <div class="eleven columns">
        <div class="five-columns">
            <?php
            echo $form->labelEx($model, 'status');
            echo $form->dropDownList($model, 'status', Order::getStatus(), array('style' => 'margin-right: 26px;'));
            ?>
        </div>

        <div class="five-columns">
            <?php
            echo $form->labelEx($model, 'date_create');
            echo $form->textField($model, 'date_create', array('disabled' => true));
            ?>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>
    <h3>Товары:</h3>

    <div class="clearfix">&nbsp;</div>
    <div class="sixteen columns">
        <div class="five-columns">
            <?php echo Chosen::dropDownList('addProduct', false, Product::model()->getList(),
                array('empty' => 'Выберите товар ...', 'onchange' => 'orderObj.getPrices($(this))')); ?>
        </div>

        <div class="five-columns">
            <?php echo CHtml::dropDownList('price', false, Product::model()->getList(),
                array('empty' => 'Выберите цену ...')); ?>
        </div>

        <div class="five-columns">
            <?php echo CHtml::button('Добавить товар', array('onclick' => 'orderObj.addProduct($(this))')); ?>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>
    <div class="sixteen columns margin-bottom-20">
       <?php $this->renderPartial('orderProducts', array('model' => $model));?>
    </div>

    <div class="clearfix">&nbsp;</div>
    <div class="eleven columns">
        <div class="five-columns">
            <?php
            echo $form->labelEx($model, 'email');
            echo $form->textField($model, 'email');
            ?>
        </div>

        <div class="five-columns">
            <?php
            echo $form->labelEx($model, 'fio');
            echo $form->textField($model, 'fio');
            ?>
        </div>

        <div class="five-columns">
            <?php
            echo $form->labelEx($model, 'phone');
            echo $form->textField($model, 'phone');
            ?>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>
    <div class="eleven columns">
        <div class="five-columns">
            <?php
            echo $form->labelEx($model, 'area');
            echo Chosen::activeDropDownList($model, 'area', Area::model()->getList());
            ?>
        </div>

        <div class="five-columns">
            <?php
            echo $form->labelEx($model, 'city');
            echo $form->textField($model, 'city');
            ?>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>
    <div class="sixteen columns">
        <div>
            <?php
            echo $form->labelEx($model, 'address');
            echo $form->textArea($model, 'address');
            ?>
        </div>

        <div>
            <?php
            echo $form->labelEx($model, 'comment');
            echo $form->textArea($model, 'comment');
            ?>
        </div>
    </div>
</fieldset>

<?php $this->endWidget(); ?>

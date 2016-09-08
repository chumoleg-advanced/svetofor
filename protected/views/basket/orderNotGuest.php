<?php
$user = User::model()->findByPk(Yii::app()->user->id, 'status = ' . User::STATUS_ACTIVE);

$model = new Order();
$attributes = array(
    'email',
    'fio',
    'phone',
    'area',
    'city',
    'address',
);

foreach ($attributes as $attr){
    $model->{$attr} = $user->{$attr};
}

?>

<div id="order-dialog" class="zoom-anim-dialog mfp-hide">
    <h3 class="headline">Оформление заказа</h3>
    <span class="line margin-bottom-10"></span>

    <div class="clearfix"></div>
    <?php
    /* @var CActiveForm $form */
    $form = $this->beginWidget('CActiveForm', array(
        'id'                   => 'orderForm',
        'action'               => '/basket/create',
        'enableAjaxValidation' => true,
        'clientOptions'        => array(
            'validateOnSubmit' => true,
            'validateOnChange' => false,
            'validateOnType'   => false,
        ),
        'htmlOptions'          => array(
            'autocomplete' => 'off',
            'class'        => 'add-comment'
        )
    ));
    ?>

    <fieldset>
        <?php
        foreach ($attributes as $attr){
            echo $form->hiddenField($model, $attr);
        }
        ?>

        <div class="eleven columns">
            <div>
                <?php
                echo $form->labelEx($model, 'comment');
                echo $form->textArea($model, 'comment');
                ?>
            </div>
        </div>

        <div class="clearfix">&nbsp;</div>
        <?php
        if (CCaptcha::checkRequirements()) {
            $this->widget('CCaptcha', array(
                'showRefreshButton' => false,
                'clickableImage'    => true,
                'imageOptions'      => array(
                    'title' => 'Обновить', 'style' => 'cursor: pointer; display: block;')));
            echo CHtml::textField('verifyCode');
        }
        ?>
    </fieldset>

    <?php
    $ajaxOptions = array(
        'type'     => 'POST',
        'dataType' => 'text',
        'data'     => 'js:$("#orderForm").serialize()',
        'success'  => 'js: function(data) {
                    if (data == "200") {
                        $("#orderForm").submit();
                    } else if (data == "400") {
                        return;
                    } else {
                        $(".errorSummary").remove();
                        $("#orderForm").prepend(data);
                        $("#yw0").trigger("click");
                        $("#verifyCode").val("");
                    }
                }',
    );

    echo CHtml::ajaxSubmitButton('Оформить', '/basket/validate', $ajaxOptions);
    $this->endWidget();
    ?>
</div>
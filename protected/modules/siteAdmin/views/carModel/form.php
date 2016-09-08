<a href="/siteAdmin/carModel/index" class="button color">Вернуться к списку</a>
<div class="clearfix">&nbsp;</div>

<?php
/* @var CActiveForm $form */
/* @var CarModel $model */
$form = $this->beginWidget('CActiveForm', array(
    'id'                   => 'car-model-form',
    'errorMessageCssClass' => 'text-error',
    'htmlOptions'          => array(
        'class'   => 'add-comment'
    ),
));
?>

<div class="text-error"><?php echo $form->errorSummary($model); ?></div>

<fieldset>
    <div>
        <?php
        echo $form->labelEx($model, 'name');
        echo $form->textField($model, 'name');
        ?>
    </div>

    <div>
        <?php
        echo $form->labelEx($model, 'status');
        echo $form->dropDownList($model, 'status', Product::getStatus());
        ?>
    </div>

    <div class="clearfix">&nbsp;</div>
    <input type="submit" value="Сохранить" />
</fieldset>
<?php $this->endWidget(); ?>

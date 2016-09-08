<a href="/siteAdmin/category/index" class="button color">Вернуться к списку</a>
<div class="clearfix">&nbsp;</div>

<?php
FancyBox::activate();

/* @var CActiveForm $form */
/* @var Category $model */
$form = $this->beginWidget('CActiveForm', array(
    'id'                   => 'category-form',
    'errorMessageCssClass' => 'text-error',
    'htmlOptions'          => array(
        'enctype' => 'multipart/form-data',
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
    <div class="five columns">
        <?php
        echo $model->getPicture(400, 250);

        echo $form->labelEx($model, 'picture');
        echo CHtml::fileField('Category_picture', $model->picture);
        ?>
    </div>

    <div class="clearfix">&nbsp;</div>
    <input type="submit" value="Сохранить" />
</fieldset>
<?php $this->endWidget(); ?>

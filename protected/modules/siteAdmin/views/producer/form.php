<a href="/siteAdmin/producer/index" class="button color">Вернуться к списку</a>
<div class="clearfix">&nbsp;</div>

<?php
/* @var CActiveForm $form */
/* @var Category $model */
$form = $this->beginWidget('CActiveForm', array(
    'id'                   => 'producer-form',
    'errorMessageCssClass' => 'text-error',
    'htmlOptions'          => array(
        'class' => 'add-comment'
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
        echo $form->labelEx($model, 'category_id');
        echo $form->dropDownList($model, 'category_id', Category::model()->getList(),
            array('empty' => 'Выберите категоию ...', 'onchange' => 'producerObj.getSubCategory($(this))'));
        ?>
    </div>

    <div>
        <?php
        $selectedCategory = $model->category_id;
        $subData = array();
        if (!empty($selectedCategory)){
            $subData = SubCategory::model()->findAll('category_id = ' . $selectedCategory);
            $subData = CHtml::listData($subData, 'id', 'name');

            $selectedSub = RelProducerSubCategory::model()->findAll('producer_id = ' . $model->id);
            $model->subCategories = CHtml::listData($selectedSub, 'id', 'sub_category_id');
        }

        echo $form->labelEx($model, 'subCategories');
        echo Chosen::activeMultiSelect($model, 'subCategories', $subData,
            array('data-placeholder' => 'Выберите подкатегории ...'));
        ?>
    </div>
    <div class="clearfix">&nbsp;</div>

    <div>
        <?php
        echo $form->labelEx($model, 'status');
        echo $form->dropDownList($model, 'status', Product::getStatus());
        ?>
    </div>

    <div class="clearfix">&nbsp;</div>
    <input type="submit" value="Сохранить"/>
</fieldset>
<?php $this->endWidget(); ?>

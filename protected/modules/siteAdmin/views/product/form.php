<?php
FancyBox::activate();

$ajaxOptions = array(
    'type'     => 'POST',
    'dataType' => 'text',
    'data'     => 'js:$("#product-form").serialize()',
    'success'  => 'js: function(data) {
                    if (data == "200") {
                        $("#product-form").submit();
                    } else if (data == "400") {
                        return;
                    } else {
                        $(".errorSummary").remove();
                        $("#product-form").prepend(data);
                    }
                }',
);

echo CHtml::ajaxSubmitButton('Сохранить', '/siteAdmin/product/validate', $ajaxOptions,
    array('type' => 'submit')); ?>

<a href="/siteAdmin/product/index"><input type="button" value="Вернуться к списку"/></a>
<div class="clearfix">&nbsp;</div>

<?php
/* @var CActiveForm $form */
/* @var Product $model */
$form = $this->beginWidget('CActiveForm', array(
    'id'                   => 'product-form',
    'errorMessageCssClass' => 'text-error',
    'enableAjaxValidation' => true,
    'clientOptions'        => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
        'validateOnType'   => false,
    ),
    'htmlOptions'          => array(
        'enctype' => 'multipart/form-data',
        'class'   => 'add-comment'
    ),
));
?>

<div class="text-error"><?php echo $form->errorSummary($model); ?></div>

<fieldset>
    <div class="eleven columns">
        <div class="five columns">
            <?php
            echo $form->labelEx($model, 'name');
            echo $form->textField($model, 'name');
            ?>
        </div>

        <div class="five columns">
            <?php
            echo $form->labelEx($model, 'article');
            echo $form->textField($model, 'article');
            ?>
        </div>

        <div class="five columns">
            <?php
            echo $form->labelEx($model, 'category_id');
            echo $form->dropDownList($model, 'category_id', Category::model()->getList(),
                array('empty' => 'Выберите категорию ...', 'onchange' => 'productObj.getSubCategory($(this))'));
            ?>
        </div>

        <div class="five columns">
            <?php
            echo $form->labelEx($model, 'status');
            echo $form->dropDownList($model, 'status', Product::getStatus());
            ?>
        </div>

        <div class="five columns">
            <?php
            echo $form->labelEx($model, 'subCategories');
            $subCategories = SubCategory::model()->getListByCategory($model->category_id);

            $selectedSub = array();
            if (!$model->isNewRecord){
                $selectedSub = RelProductSubcategory::model()->findAll('product_id = ' . $model->id);
                $selectedSub = CHtml::listData($selectedSub, 'id', 'sub_category_id');
            }

            echo Chosen::multiSelect('subCategories', $selectedSub, $subCategories,
                array('data-placeholder' => 'Выберите подкатегории ...'));
            ?>
        </div>

        <div class="five columns">
            <?php
            $producers = Producer::model()->getListByCategory($model->category_id);
            echo $form->labelEx($model, 'producer_id');
            echo Chosen::activeDropDownList($model, 'producer_id', $producers,
                array('empty' => 'Выберите производителя ...'));
            ?>
        </div>
    </div>

    <div class="five columns">
        <?php echo $model->getPicture(402, 240);?>

        <?php
        echo $form->labelEx($model, 'picture');
        echo CHtml::fileField('Product_picture', $model->picture);
        ?>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="sixteen columns">
        <div><?php echo $model->getAttributeLabel('description'); ?></div>
        <div>
            <?php
            $this->widget('application.extensions.ckeditor.CKEditor', array(
                'model'          => $model,
                'attribute'      => 'description',
                'language'       => 'ru',
                'editorTemplate' => 'advanced',
                'resizeEnabled'  => false
            ));
            ?>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>
    <div>
        <?php
        echo $form->labelEx($model, 'recommended');
        echo $form->dropDownList($model, 'recommended', Product::getRecommended());
        ?>
    </div>

    <div class="clearfix">&nbsp;</div>
    <div>
        <?php
        echo $form->labelEx($model, 'rozn_price');
        echo $form->textField($model, 'rozn_price');
        ?>
    </div>

    <div class="clearfix">&nbsp;</div>
    <div>
        <?php
        echo $form->labelEx($model, 'opt_price');
        echo $form->textField($model, 'opt_price');
        ?>
    </div>
</fieldset>

<?php echo CHtml::ajaxSubmitButton('Сохранить', '/siteAdmin/product/validate', $ajaxOptions,
    array('type' => 'submit')); ?>
<?php $this->endWidget(); ?>

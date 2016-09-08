<style>
    #product-search-form select {
        height: 35px;
        width: 95%;
    }

    #product-search-form input{
        width: 90%;
    }
</style>

<?php
/* @var $model Product */
/* @var $form CActiveForm */
?>
<div class="wide form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id'     => 'product-search-form',
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <?php echo $form->hiddenField($model, 'category_id'); ?>
    <?php echo $form->hiddenField($model, 'subCategoryId'); ?>

    <div class="">
        <?php if (!empty($subCategory)) : ?>
            <div class="four columns">
                <?php echo $form->dropDownList($model, 'subCategoryId',
                    $subCategory, array('empty' => 'Все категории ...')); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($producer) && !empty($subCategory)) : ?>
            <div class="four columns">
                <?php echo $form->dropDownList($model, 'producer_id',
                    $producer, array('empty' => 'Все производители ...')); ?>
            </div>
        <?php endif; ?>

        <div class="three columns">
            <?php echo $form->textField($model, 'name', array('placeholder' => 'Название ...')); ?>
        </div>

        <div class="three columns">
            <?php echo $form->textField($model, 'article', array('placeholder' => 'OEM ...')); ?>
        </div>

        <div class="two columns">
            <?php echo CHtml::submitButton('Поиск'); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
<a href="/siteAdmin/user/index" class="button color">Вернуться к списку</a>
<div class="clearfix">&nbsp;</div>

<?php
/* @var CActiveForm $form */
/* @var User $model */
$form = $this->beginWidget('CActiveForm', array(
    'id'                   => 'user-form',
    'errorMessageCssClass' => 'text-error',
    'htmlOptions'          => array(
        'class' => 'add-comment'
    ),
));
?>

<div class="text-error"><?php echo $form->errorSummary($model); ?></div>

<fieldset>
    <div class="five columns">
        <?php
        echo $form->labelEx($model, 'email');
        echo $form->textField($model, 'email');
        ?>
    </div>

    <div class="five columns">
        <?php
        echo $form->labelEx($model, 'fio');
        echo $form->textField($model, 'fio');
        ?>
    </div>

    <div class="five columns">
        <?php
        echo $form->labelEx($model, 'phone');
        echo $form->textField($model, 'phone');
        ?>
    </div>

    <div class="clearfix">&nbsp;</div>
    <div class="five columns">
        <?php
        echo $form->labelEx($model, 'password');
        echo $form->passwordField($model, 'password');
        ?>
    </div>

    <div class="five columns">
        <?php
        echo $form->labelEx($model, 'role');
        echo $form->dropDownList($model, 'role', User::model()->getRoles());
        ?>
    </div>

    <div class="five columns">
        <?php
        echo $form->labelEx($model, 'status');
        echo $form->dropDownList($model, 'status', User::getStatus());
        ?>
    </div>

    <div class="clearfix">&nbsp;</div>
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

    <div class="clearfix">&nbsp;</div>

    <div>
        <?php
        echo $form->labelEx($model, 'address');
        echo $form->textArea($model, 'address');
        ?>
    </div>

    <div class="clearfix">&nbsp;</div>
    <input type="submit" value="Сохранить"/>
</fieldset>
<?php $this->endWidget(); ?>


<script>
    $(document).ready(function () {
        <?php echo (!$model->isNewRecord) ? "$('#User_password').val('');" : '';?>
    });
</script>

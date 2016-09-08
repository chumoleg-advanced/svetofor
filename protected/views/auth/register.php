<div class="container margin-bottom-30">
    <h3 class="headline">Регистрация</h3>
    <span class="line margin-bottom-30"></span>
    <div class="clearfix"></div>

    <?php
    /* @var CActiveForm $form */
    $form = $this->beginWidget('CActiveForm', array(
        'id'                   => 'registerForm',
        'enableAjaxValidation' => false,
        'htmlOptions'          => array(
            'class'        => 'add-comment'
        )
    ));
    ?>

    <div class="text-error">
        <?php echo $form->errorSummary($model); ?>
    </div>

    <fieldset>
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
        </div>

        <div class="clearfix">&nbsp;</div>

        <div class="eleven columns">
            <div class="five-columns">
                <?php
                echo $form->labelEx($model, 'password');
                echo $form->passwordField($model, 'password');
                ?>
            </div>

            <div class="five-columns">
                <?php
                echo $form->labelEx($model, 'confirmPassword');
                echo $form->passwordField($model, 'confirmPassword');
                ?>
            </div>
        </div>

        <div class="clearfix">&nbsp;</div>

        <div class="eleven columns">
            <div>
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

        <div class="eleven columns">
            <div>
                <?php
                echo $form->labelEx($model, 'address');
                echo $form->textArea($model, 'address');
                ?>
            </div>
        </div>

        <div class="clearfix"></div>
        <input type="submit" class="color margin-top-10 myButton" value="Регистрация" />
    </fieldset>

    <?php $this->endWidget(); ?>
</div>

<script>
    $(document).ready(function(){
        $('#User_password, #User_confirmPassword').val('');
    });
</script>
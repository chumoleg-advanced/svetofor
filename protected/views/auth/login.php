<div class="container margin-bottom-30">
    <h3 class="headline">Авторизация</h3>
    <span class="line margin-bottom-30"></span>
    <div class="clearfix"></div>

    <?php
    /* @var CActiveForm $form */
    $form = $this->beginWidget('CActiveForm', array(
        'id'                   => 'loginForm',
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
        <div>
            <?php
            echo $form->labelEx($model, 'email');
            echo $form->textField($model, 'email');
            ?>
        </div>

        <div>
            <?php
            echo $form->labelEx($model, 'password');
            echo $form->passwordField($model, 'password');
            ?>
        </div>

        <div>
            <label for="LoginForm_rememberMe">Запомнить меня
                <input type="checkbox" name="LoginForm[rememberMe]" id="LoginForm_rememberMe" />
            </label>
        </div>

        <input type="submit" class="color margin-top-10 myButton" value="Войти" />
        <a href="/auth/register" style="margin-left: 20px; color:#000000">Регистрация</a>
    </fieldset>
    <?php $this->endWidget(); ?>

    <div class="clearfix"></div>
</div>

<script>
    $(document).ready(function(){
        $('#LoginForm_password').val('');
    });
</script>
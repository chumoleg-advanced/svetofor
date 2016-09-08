<div id="order-dialog" class="zoom-anim-dialog mfp-hide">
    <h3 class="headline">Оформление заказа</h3>
    <span class="line margin-bottom-10"></span>

    <div class="clearfix"></div>
    <?php
    $model = new Order();

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
                echo Chosen::activeDropDownList($model, 'area',
                    Area::model()->getList());
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
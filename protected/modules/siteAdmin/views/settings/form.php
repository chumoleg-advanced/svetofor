<script>
    $(document).ready(function(){
        $('.deletePrice').click(function(){
            if (!confirm("Вы уверены, что хотите удалить файл?")){
                return false;
            }

            var file = $(this).attr('fileName');
            document.location.href = "/siteAdmin/settings/deleteCatalog?file="+file;
        })
    });
</script>

<a href="/siteAdmin/settings/index" class="button color">Вернуться к списку</a>
<div class="clearfix">&nbsp;</div>

<?php
/* @var CActiveForm $form */
/* @var Settings $model */
$form = $this->beginWidget('CActiveForm', array(
    'id'                   => 'settings-form',
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

    <?php if ($model->id == 1 || $model->id == 2) : ?>
        <?php
        $folderName = 'catalogs';
        if ($model->id == 1){
            $folderName = 'offline';
        }

        echo CHtml::hiddenField('folderName', $folderName);
        ?>
        <div>
            <?php
            echo CHtml::label('Загрузка файла', 'file');
            echo CHtml::fileField('file', '');
            ?>
        </div>

        <?php $fileList = glob(Yii::app()->basePath . '/data/catalogs/*', GLOB_BRACE); ?>
        <table class="cart-table">
            <?php foreach ($fileList as $file) : ?>
                <?php
                $tmp = explode('/', $file);
                $file = end($tmp);
                ?>
                <tr>
                    <td>
                        <?php echo CHtml::link($file, '/download/catalog?file=' . base64_encode($file)); ?>
                    </td>
                    <td>
                        <?php echo CHtml::link('Удалить', '#',
                            array('class' => 'deletePrice', 'fileName' => base64_encode($file))); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br />

    <?php endif; ?>

    <div>
        <div><?php echo $model->getAttributeLabel('text'); ?></div>
        <div>
            <?php
            $this->widget('application.extensions.ckeditor.CKEditor', array(
                'model'          => $model,
                'attribute'      => 'text',
                'language'       => 'ru',
                'editorTemplate' => 'advanced',
                'resizeEnabled'  => false
            ));
            ?>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>
    <input type="submit" value="Сохранить"/>
</fieldset>
<?php $this->endWidget(); ?>

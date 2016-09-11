<script>
    $(document).ready(function () {
        $('.deleteFile').click(function () {
            if (!confirm("Вы уверены, что хотите удалить файл?")) {
                return false;
            }

            var file = $(this).attr('fileName');
            var folder = $(this).attr('folderName');
            document.location.href = "/siteAdmin/settings/deleteFile?file=" + file + '&folder=' + folder;
        })
    });
</script>

<a href="/siteAdmin/settings/index" class="button color">Вернуться к списку</a>
<div class="clearfix">&nbsp;</div>

<?php
/* @var CActiveForm $form */
/* @var Settings $model */
$form = $this->beginWidget('CActiveForm', [
    'id'                   => 'settings-form',
    'errorMessageCssClass' => 'text-error',
    'htmlOptions'          => [
        'enctype' => 'multipart/form-data',
        'class'   => 'add-comment'
    ],
]);
?>

<div class="text-error"><?php echo $form->errorSummary($model); ?></div>

<fieldset>
    <div>
        <?php
        echo $form->labelEx($model, 'name');
        echo $form->textField($model, 'name');
        ?>
    </div>

    <?php if (in_array($model->id, [Settings::OFFLINE_ORDER, Settings::CATALOGS, Settings::CERTIFICATES])) : ?>
        <?php

        if ($model->id == Settings::OFFLINE_ORDER) {
            $folderName = 'offline';

        } elseif ($model->id == Settings::CERTIFICATES) {
            $folderName = 'certificates';

        } else {
            $folderName = 'catalogs';
        }

        echo CHtml::hiddenField('folderName', $folderName);
        ?>
        <div>
            <?php
            echo CHtml::label('Загрузка файла', 'file');
            echo CHtml::fileField('file', '');
            ?>
        </div>

        <?php $fileList = glob(Yii::app()->basePath . '/data/' . $folderName . '/*', GLOB_BRACE); ?>
        <table class="cart-table">
            <?php foreach ($fileList as $file) : ?>
                <?php
                $tmp = explode('/', $file);
                $file = end($tmp);
                ?>
                <tr>
                    <td>
                        <?php echo CHtml::link($file,
                            '/download/file?file=' . base64_encode($file) . '&folder=' . $folderName); ?>
                    </td>
                    <td>
                        <?php echo CHtml::link('Удалить', '#', [
                            'class'      => 'deleteFile',
                            'fileName'   => base64_encode($file),
                            'folderName' => $folderName
                        ]); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br/>

    <?php endif; ?>

    <div>
        <div><?php echo $model->getAttributeLabel('text'); ?></div>
        <div>
            <?php
            $this->widget('application.extensions.ckeditor.CKEditor', [
                'model'          => $model,
                'attribute'      => 'text',
                'language'       => 'ru',
                'editorTemplate' => 'advanced',
                'resizeEnabled'  => false
            ]);
            ?>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>
    <input type="submit" value="Сохранить"/>
</fieldset>
<?php $this->endWidget(); ?>

<?php
$folder = 'certificates';
$fileList = glob(Yii::app()->basePath . '/data/' . $folder . '/*', GLOB_BRACE);
?>

<div class="container margin-bottom-20">
    <div class="sixteen columns">
        <h3 class="headline"><?php echo Settings::model()->getText(Settings::CERTIFICATES); ?></h3>
        <span class="line margin-bottom-0"></span>
    </div>

    <?php $this->renderPartial('_files', [
        'folder'   => $folder,
        'fileList' => $fileList,
        'image'    => '/images/certificate-template.jpg'
    ]); ?>
</div>
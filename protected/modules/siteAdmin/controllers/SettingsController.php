<?php

class SettingsController extends CrudController
{
    public function init()
    {
        $this->model = Settings::model();
        parent::init();
    }

    public function actionCreate()
    {
        $this->redirect('/siteModel/settings/index');
    }

    public function actionIndex()
    {
        $this->pageTitle = 'Настройки';
        parent::actionIndex();
    }

    protected function _savePost()
    {
       parent::_savePost(true);
    }

    protected function _savePicture()
    {
        $folderName = MyArray::getPost('folderName');
        $file = CHtml::value($_FILES, 'file');
        $fileSize = CHtml::value($file, 'size');
        if (!empty($fileSize)) {
            $uploadDir = Yii::app()->basePath . '/data/' . $folderName . '/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir);
                chmod($uploadDir, 0777);
            }

            $uploadFile = $uploadDir . '/' . $file['name'];
            move_uploaded_file($file['tmp_name'], $uploadFile);
        }
    }

    public function actionDeleteFile()
    {
        $file = Yii::app()->request->getParam('file');
        $folder = Yii::app()->request->getParam('folder');
        if (empty($file) || empty($folder)) {
            $this->redirect('/siteAdmin/settings/index');
        }

        unlink(Yii::app()->getBasePath() . '/data/' . $folder . '/' . base64_decode($file));
        $this->redirect('/siteAdmin/settings/index');
    }
}
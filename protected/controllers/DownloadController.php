<?php

class DownloadController extends Controller
{
    public function actionOffline()
    {
        if (Yii::app()->user->isGuest) {
            $this->redirect('/');
        }

        $fileList = glob(Yii::app()->basePath . '/data/offline/*.{xls,xlsx,csv}', GLOB_BRACE);
        if (empty($fileList)) {
            Yii::app()->user->setFlash('errorFile', 'К сожалению файл не найден!');
            $this->redirect('/site/offlineOrder');
        }

        $file = current($fileList);
        $tmp = explode('/', $file);
        $file = end($tmp);

        $tmpExt = explode('.', $file);
        $ext = end($tmpExt);

        DownloadSend::send($ext, 'Светофор_оффлайн_заказ_' . date('Y_m_d'));
        $fileFolder = Yii::app()->getBasePath() . '/data/offline/' . $file;
        readfile($fileFolder);
    }

    public function actionFile()
    {
        if (Yii::app()->user->isGuest) {
            $this->redirect('/');
        }

        $file = Yii::app()->request->getParam('file');
        $folder = Yii::app()->request->getParam('folder');
        if (empty($file) || empty($folder)) {
            $this->redirect('/');
        }

        $file = base64_decode($file);
        $tmpExt = explode('.', $file);
        $fileName = current($tmpExt);
        $ext = end($tmpExt);

        DownloadSend::send($ext, $fileName);
        $fileFolder = Yii::app()->getBasePath() . '/data/' . $folder . '/' . $file;
        readfile($fileFolder);
    }
}
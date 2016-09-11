<?php

class SiteController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionError()
    {
        $this->_hideAllElements();

        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
        }
    }

    private function _hideElements()
    {
        $this->showMainSlider = false;
        $this->showLastProducts = false;
        $this->showRecommendedProducts = false;
    }

    public function actionOfflineOrder()
    {
        if (!Yii::app()->user->isAdminOrGross){
            $this->redirect('/');
        }

        $this->_hideElements();
        $this->render('offlineOrder');
    }

    public function actionCatalog()
    {
        $this->_hideElements();
        $this->render('catalog');
    }

    public function actionCertificate()
    {
        $this->_hideElements();
        $this->render('certificate');
    }

    public function actionDelivery()
    {
        $this->_hideElements();
        $this->render('delivery');
    }

    public function actionAboutCompany()
    {
        $this->_hideElements();
        $this->render('aboutCompany');
    }

    public function actionProduct()
    {
        $this->_hideElements();
        if (empty($_GET['Product'])){
            $this->render('notProducts');
            Yii::app()->end();
        }

        $model = new Product('search');
        $model->unsetAttributes();
        $model->attributes = $_GET['Product'];
        $dataProvider = $model->search();

        $this->render('product', array('data' => $dataProvider, 'model' => $model));
    }
}
<?php

class CabinetController extends Controller
{
    public $model;
    public $orderModel;
    public $orderDataProvider;

    public function init()
    {
        if (Yii::app()->user->isGuest) {
            $this->redirect('/auth/login');
        }

        if (Yii::app()->user->isAdmin) {
            $this->redirect('/siteAdmin');
        }

        $this->showMainSlider = false;
        $this->showLastProducts = false;
        $this->showRecommendedProducts = false;
    }

    public function actionIndex()
    {
        $this->model = User::model()->findByPk(Yii::app()->user->id);
        $this->render('index');
    }

    public function actionOrders()
    {
        $this->orderModel = new Order('search');
        $this->orderModel->unsetAttributes();
        $this->orderModel->user_id = Yii::app()->user->id;
        if (isset($_GET['Order'])){
            $this->orderModel->attributes = $_GET['Order'];
        }

        $this->orderDataProvider = $this->orderModel->search();

        $this->render('orders');
    }

    public function actionOrder($id)
    {
        $model = $this->_loadOrderModel($id);
        $this->render('order', array('model' => $model));
    }

    private function _loadOrderModel($id)
    {
        $id = (int)$id;
        if (empty($id)){
            throw new CHttpException(404, 'Страница не найдена');
        }

        $criteria = new CDbCriteria();
        $criteria->compare('t.id', $id);
        $criteria->with = array('relOrderProducts.product');
        $model = Order::model()->find($criteria);
        if (empty($model)){
            throw new CHttpException(404, 'Страница не найдена');
        }

        return $model;
    }
}
<?php

class BasketController extends Controller
{
    public function filters()
    {
        return array();
    }

    public function actions()
    {
        return array(
            'captcha' => array(
                'class'       => 'MyCaptchaAction',
                'backColor'   => 0xffffff,
                'testLimit'   => 5,
                'transparent' => true,
                'foreColor'   => 0x000000,
            )
        );
    }

    public function init()
    {
        $this->_hideAllElements();
    }

    public function actionIndex()
    {
        $this->createAction('captcha')->getVerifyCode(true);
        $basket = Basket::model()->getMyBasket();
        if (empty($basket)) {
            $this->render('notProducts');
            Yii::app()->end();
        }

        $this->render('index', array('basket' => $basket));
    }

    public function actionValidate()
    {
        if (!Yii::app()->request->isAjaxRequest) {
            echo 400;
        }

        parse_str(Yii::app()->request->getRawBody(), $formData);
        if (empty($formData) || empty($formData['Order'])) {
            echo 400;
            Yii::app()->end();
        }

        $modelData = $formData['Order'];
        $model = new Order('validateCaptcha');
        $model->setAttributes($modelData, false);

        $model->verifyCode = $formData['verifyCode'];
        if (!$model->validate()) {
            $form = new CActiveForm();
            $form->enableAjaxValidation = true;
            $form->validate($model);

            echo $form->errorSummary($model);
            Yii::app()->end();
        }

        echo 200;
    }

    public function actionCreate()
    {
        $data = MyArray::get($_POST, 'Order');
        if (!Yii::app()->request->isPostRequest || empty($data)) {
            $this->redirect('/basket/index');
        }

        $model = new Order('validateCaptcha');
        $model->attributes = $data;
        $model->verifyCode = MyArray::get($_POST, 'verifyCode');
        if ($model->save()) {
            $this->redirect('/basket/final');
        }

        $this->redirect('/basket/index');
    }

    public function actionFinal()
    {
        $this->render('final');
    }

    public function actionAddProduct()
    {
        if (!Yii::app()->request->isAjaxRequest) {
            return;
        }

        $price = Yii::app()->request->getParam('price', 0);
        $productId = (int)Yii::app()->request->getParam('productId');
        list($count, $sum) = Basket::model()->getSumAndCount();
        if (!$this->_checkProductId($productId)) {
            $this->_returnAnswer($count, $sum);
        }

        $check = Basket::model()->findRowByProduct($productId);
        if (empty($check)) {
            Basket::model()->addNewRecord($productId, $price);
        } else {
            $check->quantity += 1;
            $check->price += $price;
            $check->save(false);
        }

        list($count, $sum) = Basket::model()->getSumAndCount();
        $this->_returnAnswer($count, $sum);
    }

    public function actionDelete()
    {
        if (!Yii::app()->request->isAjaxRequest) {
            return;
        }

        $id = (int)Yii::app()->request->getParam('id');
        Basket::model()->deleteByPk($id);
        list($count, $sum) = Basket::model()->getSumAndCount();
        $this->_returnAnswer($count, $sum);
    }

    private function _returnAnswer($count, $sum)
    {
        echo CJSON::encode(array(
            'sum'   => NumberFormat::get($sum) . ' руб.',
            'count' => $count
        ));

        Yii::app()->end();
    }

    /**
     * @param $productId
     * @return bool|Product
     */
    private function _checkProductId($productId)
    {
        if (empty($productId)) {
            return false;
        }

        $productObj = Product::model()->findByPk($productId);
        if (empty($productObj)) {
            return false;
        }

        return true;
    }

    public function actionChangeCount()
    {
        if (!Yii::app()->request->isAjaxRequest) {
            return;
        }

        $id = (int)Yii::app()->request->getParam('id');
        $countProduct = (int)Yii::app()->request->getParam('count');
        list($count, $sum) = Basket::model()->getSumAndCount();
        if (empty($countProduct)) {
            $this->_returnAnswer($count, $sum);
        }


        $check = Basket::model()->findByPk($id);
        $singlePrice = 0;
        if (!empty($check)) {
            $check->quantity = $countProduct;
            $check->price = $check->single_price * $countProduct;
            $check->save(false);

            $singlePrice = $check->single_price;
        }

        list($count, $sum) = Basket::model()->getSumAndCount();
        echo CJSON::encode(array(
            'sum'         => NumberFormat::get($sum) . ' руб.',
            'count'       => $count,
            'singlePrice' => $singlePrice,
            'singleSum'   => NumberFormat::get($singlePrice * $countProduct) . ' руб.'
        ));
    }
}
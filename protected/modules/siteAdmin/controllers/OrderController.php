<?php

class OrderController extends CrudController
{
    public function init()
    {
        $this->model = Order::model();
        parent::init();
    }

    public function actionCreate()
    {
        $this->redirect('index');
    }

    public function actionIndex()
    {
        $this->pageTitle = 'Заказы';
        parent::actionIndex();
    }

    public function actionDelete($id)
    {
        $this->redirect('index');
    }

    public function actionGetPrice()
    {
        $productId = Yii::app()->request->getParam('productId');
        if (empty($productId)) {
            $html = CHtml::dropDownList('price', false, array(), array('empty' => 'Выберите цену ...'));
            MyJson::answerHtml($html);
        }

        $model = Product::model()->findByPk($productId);
        $productPrices = array(
            $model->rozn_price => $model->rozn_price,
            $model->opt_price  => $model->opt_price,
        );
        $html = CHtml::dropDownList('price', false, $productPrices, array('empty' => 'Выберите цену ...'));
        MyJson::answerHtml($html);
    }

    public function actionAddProduct()
    {
        $productId = Yii::app()->request->getParam('productId');
        $price = Yii::app()->request->getParam('price');
        $orderId = Yii::app()->request->getParam('orderId');
        if (empty($productId) || empty($orderId)) {
            MyJson::answerHtml('');
        }

        $rel = new RelOrderProduct();
        $rel->product_id = $productId;
        $rel->price = $price;
        $rel->quantity = 1;
        $rel->order_id = $orderId;
        $rel->save(false);

        $model = Order::model()->findByPk($orderId);
        $model->price += $price;
        $model->save(false);

        $html = $this->renderPartial('orderProducts', array('model' => $model), true);
        MyJson::answerHtml($html);
    }

    public function actionChangeCount()
    {
        $id = Yii::app()->request->getParam('id');
        $count = Yii::app()->request->getParam('count');
        if (empty($id)) {
            MyJson::answerHtml('');
        }

        $rel = RelOrderProduct::model()->findByPk($id);
        $oldCount = $rel->quantity;
        $rel->quantity = $count;
        $rel->save(false);

        $model = Order::model()->findByPk($rel->order_id);
        if ($oldCount > $count) {
            $model->price -= ($oldCount - $count) * $rel->price;
        } else {
            $model->price += ($count - $oldCount) * $rel->price;
        }
        $model->save(false);

        $html = $this->renderPartial('orderProducts', array('model' => $model), true);
        MyJson::answerHtml($html);
    }

    public function actionDeleteProduct()
    {
        $id = Yii::app()->request->getParam('id');
        if (empty($id)) {
            MyJson::answerHtml('');
        }

        $rel = RelOrderProduct::model()->findByPk($id);
        $orderId = $rel->order_id;
        $price = $rel->price;
        $rel->delete();

        $model = Order::model()->findByPk($orderId);
        $model->price -= $price;
        $model->save(false);

        $html = $this->renderPartial('orderProducts', array('model' => $model), true);
        MyJson::answerHtml($html);
    }
}
<?php

class ProductController extends CrudController
{
    public function init()
    {
        $this->model = Product::model();
        parent::init();
    }

    public function actionCreate()
    {
        $this->pageTitle = 'Добавление нового товара';
        parent::actionCreate();
    }

    public function actionIndex()
    {
        $this->pageTitle = 'Товары';
        parent::actionIndex();
    }

    protected function _savePost()
    {
        $data = MyArray::getPost('Product');
        if (empty($data)) {
            return;
        }

        $this->model->attributes = $data;
        $subCategories = MyArray::getPost('subCategories');
        if (!empty($subCategories)) {
            $this->model->subCategories = $subCategories;
        }

        if ($this->model->save()) {
            $this->_savePicture();
            $this->redirect('/siteAdmin/product/index');
        }
    }

    public function actionValidate()
    {
        parse_str(Yii::app()->request->getRawBody(), $formData);
        if (empty($formData) || empty($formData['Product'])) {
            echo 400;
            Yii::app()->end();
        }

        $modelData = $formData['Product'];
        if(!empty($modelData['id'])){
            $model = Product::model()->findByPk($modelData['id']);
        } else {
            $model = new Product();
        }

        $model->setAttributes($modelData);
        if (!$model->validate()){
            $form = new CActiveForm();
            $form->enableAjaxValidation = true;
            $form->validate($model);

            echo $form->errorSummary($model);
            Yii::app()->end();
        }

        echo 200;
    }
}

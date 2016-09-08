<?php

class ProducerController extends CrudController
{
    public function init()
    {
        $this->model = Producer::model();
        parent::init();
    }

    public function actionCreate()
    {
        $this->pageTitle = 'Добавление нового производителя';
        parent::actionCreate();
    }

    public function actionIndex()
    {
        $this->pageTitle = 'Производители товаров';
        parent::actionIndex();
    }

    public function actionGetSubCategoryByCategory()
    {
        $categoryId = Yii::app()->request->getParam('categoryId');
        if (empty($categoryId)) {
            $htmlSub = Chosen::activeMultiSelect(Producer::model(), 'subCategories', array(),
                array('data-placeholder' => 'Выберите подкатегории ...'));

            echo CJSON::encode(array('status' => 'ok', 'htmlSub' => $htmlSub));
            Yii::app()->end();
        }

        $data = SubCategory::model()->getListByCategory($categoryId);
        $htmlSub = Chosen::activeMultiSelect(Producer::model(), 'subCategories', $data,
            array('data-placeholder' => 'Выберите подкатегории ...'));

        echo CJSON::encode(array('status' => 'ok', 'htmlSub' => $htmlSub));
    }
}
<?php

class CarModelController extends CrudController
{
    public function init()
    {
        $this->model = CarModel::model();
        parent::init();
    }

    public function actionCreate()
    {
        $this->pageTitle = 'Добавление новой модели';
        parent::actionCreate();
    }

    public function actionIndex()
    {
        $this->pageTitle = 'Модели автомобилей';
        parent::actionIndex();
    }
}
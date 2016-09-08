<?php

class SubCategoryController extends CrudController
{
    public function init()
    {
        $this->model = SubCategory::model();
        parent::init();
    }

    public function actionCreate()
    {
        $this->pageTitle = 'Добавление новой подкатегории';
        parent::actionCreate();
    }

    public function actionIndex()
    {
        $this->pageTitle = 'Подкатегории';
        parent::actionIndex();
    }

    public function actionDelete($id)
    {
        $this->redirect('index');
    }
}
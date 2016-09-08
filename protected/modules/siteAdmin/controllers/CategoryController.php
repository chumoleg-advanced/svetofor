<?php

class CategoryController extends CrudController
{
    public function init()
    {
        $this->model = Category::model();
        parent::init();
    }

    public function actionCreate()
    {
        $this->pageTitle = 'Добавление новой категории';
        parent::actionCreate();
    }

    public function actionIndex()
    {
        $this->pageTitle = 'Категории';
        parent::actionIndex();
    }

    public function actionDelete($id)
    {
        $this->redirect('index');
    }

    protected function _savePost()
    {
       parent::_savePost(true);
    }
}
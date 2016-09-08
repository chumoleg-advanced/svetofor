<?php

class UserController extends CrudController
{
    public function init()
    {
        $this->model = User::model();
        parent::init();
    }

    public function actionCreate()
    {
        $this->redirect('index');
    }

    public function actionIndex()
    {
        $this->pageTitle = 'Пользователи';
        parent::actionIndex();
    }

    public function actionDelete($id)
    {
        $this->redirect('index');
    }
}
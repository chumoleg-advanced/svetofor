<?php
/**
 * Created by PhpStorm.
 * User: chumakov.o
 * Date: 31.03.14
 *
 */

class CrudController extends CController
{
    public $layout = '//layouts/mainAdmin';
    public $breadcrumbs = array();
    public $showHeader = false;

    /**
     * @var MyActiveRecord
     */
    protected $model;
    protected $modelName;

    public function init()
    {
        if (!Yii::app()->user->isAdmin){
            $this->redirect('/');
        }

        if (empty($this->model)){
            return;
        }

        $this->modelName = get_class($this->model);
        parent::init();
    }

    public function filters()
    {
        return array(
            'accessControl'
        );
    }

    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions' => array('index', 'create', 'update', 'delete'),
                'roles'   => array(User::ADMIN),
            ),
            array(
                'deny',
                'roles' => array('guest'),
            ),
        );
    }

    public function actionCreate()
    {
        $this->model = new $this->modelName;
        $this->_savePost();
        $this->_renderForm();
    }

    protected function _savePost($withPicture = false)
    {
        if (!isset($_POST[$this->modelName])) {
            return;
        }

        $this->model->attributes = $_POST[$this->modelName];
        if ($this->model->save()) {
            if ($withPicture){
                $this->_savePicture();
            }

            $this->redirect('/siteAdmin/' . $this->modelName . '/index');
        }
    }

    protected function _renderForm()
    {
        $this->render('form', array(
            'model' => $this->model,
        ));
    }

    public function actionUpdate($id)
    {
        $this->_loadModel($id);
        $this->pageTitle = isset($this->model->name) ? $this->model->name : 'Редактирование';
        $this->_savePost();
        $this->_renderForm();
    }

    /**
     * @param $id
     *
     * @throws CHttpException
     */
    protected function _loadModel($id)
    {
        $model = $this->model->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'Страница не найдена!');
        }

        $this->model = $model;
    }

    public function actionDelete($id)
    {
        $this->model->deleteByPk($id);
        $this->redirect('/siteAdmin/' . $this->modelName . '/index');
    }

    public function actionIndex()
    {
        $model = new $this->modelName('search');
        $model->unsetAttributes();
        if (isset($_GET[$this->modelName])) {
            $model->attributes = $_GET[$this->modelName];
        }

        $this->render('index', array(
            'model'        => $model,
            'dataProvider' => $model->search()
        ));
    }

    protected function _savePicture()
    {
        $image = MyArray::get($_FILES, $this->modelName . '_picture');
        $fileSize = MyArray::get($image, 'size');
        if (!empty($fileSize)) {
            $uploadDir = 'images/' . $this->modelName . '/' . $this->model->id;
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir);
                chmod($uploadDir, 0777);
            }

            $uploadFile = ImageHelper::saveFile($uploadDir, $image);
            $this->model->picture = '/' . $uploadFile;
            $this->model->save(false);
        }
    }
}
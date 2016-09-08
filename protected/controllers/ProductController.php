<?php

class ProductController extends Controller
{
    /**
     * @var Product
     */
    public $model;

    public function init()
    {
        $this->_hideAllElements();
    }

    public function actionView($id)
    {
        $this->_loadModel($id);
        $this->render('view');
    }

    private function _loadModel($id)
    {
        if (empty($id)) {
            throw new CHttpException(404, 'Страница не найдена');
        }

        $model = Product::model()->with('category')->findByPk($id);
        if (empty($model)) {
            throw new CHttpException(404, 'Страница не найдена');
        }

        $this->model = $model;
    }

    public function actionIndex()
    {
        $categoryName = 'Все товары';
        $model = new Product('search');
        $model->unsetAttributes();
        if (isset($_GET['Product'])) {
            $model->attributes = $_GET['Product'];
            $model->subCategoryId = MyArray::get($_GET['Product'], 'subCategoryId');

            if (!empty($model->category_id)) {
                $categoryName = $model->category->name;
            }
        }

        $producer = array();
        $subCategory = array();
        if (!empty($model->category_id)) {
            $subCategory = SubCategory::model()->getListByCategory($model->category_id);
            $producer = Producer::model()->getListByCategory($model->category_id);
        }

        if (!empty($model->subCategoryId)) {
            $producer = Producer::model()->getListBySubCategory($model->subCategoryId);
        }

        $dataProvider = $model->search();
        $this->render('index', array(
            'data'         => $dataProvider,
            'producer'     => $producer,
            'subCategory'  => $subCategory,
            'model'        => $model,
            'categoryName' => $categoryName
        ));
    }

    public function actionGetSubCategoryByCategory()
    {
        $categoryId = Yii::app()->request->getParam('categoryId');
        if (empty($categoryId)) {
            $htmlSub = Chosen::activeMultiSelect(Product::model(), 'subCategories', array(),
                array('data-placeholder' => 'Выберите подкатегории ...'));
            $htmlProducer = Chosen::activeDropDownList(Product::model(), 'producer_id', array(),
                array('empty' => 'Выберите производителя ...'));

            echo CJSON::encode(array('status' => 'ok', 'htmlSub' => $htmlSub, 'htmlProducer' => $htmlProducer));
            Yii::app()->end();
        }

        $data = SubCategory::model()->getListByCategory($categoryId);
        $htmlSub = Chosen::activeMultiSelect(Product::model(), 'subCategories', $data,
            array('data-placeholder' => 'Выберите подкатегории ...'));

        $data = Producer::model()->getListByCategory($categoryId);
        $htmlProducer = Chosen::activeDropDownList(Product::model(), 'producer_id', $data,
            array('empty' => 'Выберите производителя ...'));

        echo CJSON::encode(array('status' => 'ok', 'htmlSub' => $htmlSub, 'htmlProducer' => $htmlProducer));
    }
}
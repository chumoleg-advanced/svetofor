<?php

class ProductImageController extends CrudController
{
    public function init()
    {
        $this->model = Product::model();
        parent::init();
    }

    public function actionIndex()
    {
        $this->pageTitle = 'Привязка изображений к товарам';

        $products = Product::model()->findAll('picture IS NULL');
        $productList = CHtml::listData($products, 'id', 'name');

        $basePath = Yii::app()->getBasePath() . '/..';
        $directory = $basePath . '/images/undistributed/';
        $fileList = glob($directory . '*.{jpg,jpeg,png}', GLOB_BRACE);

        $data = [];
        foreach ($fileList as $fileName) {
            $href = str_replace($basePath, '', $fileName);
            $data[] = [
                'fileName'   => $href,
                'preview'    => $this->_getPreviewPicture($href),
                'bindButton' => $this->_getBindDropDown($productList, $fileName),
            ];
        }

        $dataProvider = new CArrayDataProvider($data, [
            'keyField'   => 'fileName',
            'sort'       => false,
            'pagination' => [
                'pageSize' => 30
            ]
        ]);

        $this->render('index', [
            'dataProvider' => $dataProvider,
            'productList'  => $productList
        ]);
    }

    private function _getPreviewPicture($href, $width = 200, $height = 200)
    {
        $imageSmall = CHtml::image(Yii::app()->request->baseUrl .
            ImageHelper::thumb($width, $height, $href, ['method' => 'adaptiveResize']));

        $image = Yii::app()->request->baseUrl . $href;

        return CHtml::link($imageSmall, $image, ['class' => 'single_image']);
    }

    public function _getBindDropDown($productList, $fileName)
    {
        return Chosen::dropDownList('bindProduct', false, $productList, [
            'id'             => 'bindProduct_' . md5($fileName),
            'class'          => 'bindImageToProduct',
            'data-file-name' => $fileName,
            'empty'          => 'Выберите товар...'
        ]);
    }

    public function actionBind()
    {
        $productId = (int)Yii::app()->request->getParam('product');
        $fileName = Yii::app()->request->getParam('fileName');
        if (empty($productId) || empty($fileName)) {
            MyJson::answerError('Указаны некорректные параметры');
        }

        $model = Product::model()->findByPk($productId);
        if (empty($model) || !is_readable($fileName)) {
            MyJson::answerError('Указаны некорректные параметры');
        }

        $uploadDir = Yii::app()->getBasePath() . '/../images/Product/' . $productId . '/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir);
            chmod($uploadDir, 0777);
        }

        $baseFileName = basename($fileName);
        $ext = strtolower(substr(strrchr($baseFileName, '.'), 1));
        $uploadFileName = MyString::translate($baseFileName) . '.' . $ext;

        $newFileName = $uploadDir . '/' . $uploadFileName;
        if (!copy($fileName, $newFileName)) {
            MyJson::answerError('Не удалось скопировать файл');
        }

        unlink($fileName);

        $model->picture = '/images/Product/' . $productId . '/' . $uploadFileName;
        $model->save(false);

        MyJson::answerHtml(true);
    }
}

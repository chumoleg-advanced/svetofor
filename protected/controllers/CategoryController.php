<?php

class CategoryController extends Controller
{
    /**
     * @var Category[]
     */
    public $allCategories;

    /**
     * @var Category
     */
    public $model;

    /**
     * @var CActiveDataProvider
     */
    public $productsData;

    public function init()
    {
        $this->_hideAllElements();
    }
}
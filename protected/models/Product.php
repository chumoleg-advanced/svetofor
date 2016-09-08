<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $article
 * @property integer $status
 * @property string $picture
 * @property integer $category_id
 * @property integer $producer_id
 * @property float $opt_price
 * @property float $rozn_price
 * @property string $date_create
 * @property integer $recommended
 *
 * The followings are the available model relations:
 * @property Basket[] $baskets
 * @property Category $category
 * @property RelOrderProduct[] $relOrderProducts
 * @property RelProductSubcategory[] $relProductSubcategories
 * @property Producer $producer
 */
class Product extends MyActiveRecord
{
    const RECOMMENDED_NO = 1;
    const RECOMMENDED_YES = 2;

    public $subCategories;
    public $subCategoryId;

    public static function getRecommended($status = null)
    {
        $array = array(
            self::RECOMMENDED_NO  => 'Нет',
            self::RECOMMENDED_YES => 'Да'
        );

        return !empty($status) ? CHtml::value($array, $status) : $array;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'product';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, article, category_id, rozn_price, opt_price', 'required'),
            array('status, recommended, category_id, producer_id', 'numerical', 'integerOnly' => true),
            array('rozn_price, opt_price', 'numerical', 'min' => 0),
            array('name, article', 'length', 'max' => 255),
            array('picture, description', 'length', 'max' => 500),
            array('category_id', 'length', 'max' => 4),
            array('description, date_create', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, description, article, status, picture, category_id,
                date_create, recommended, subCategories, producer_id, rozn_price, opt_price, subCategoryId',
                'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'baskets'                 => array(self::HAS_MANY, 'Basket', 'product_id'),
            'category'                => array(self::BELONGS_TO, 'Category', 'category_id'),
            'relOrderProducts'        => array(self::HAS_MANY, 'RelOrderProduct', 'product_id'),
            'relProductSubcategories' => array(self::HAS_MANY, 'RelProductSubcategory', 'product_id'),
            'producer'                => array(self::BELONGS_TO, 'Producer', 'producer_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'            => 'ID',
            'name'          => 'Название',
            'description'   => 'Описание',
            'article'       => 'OEM',
            'status'        => 'Статус',
            'picture'       => 'Основное изображение',
            'category_id'   => 'Категория',
            'date_create'   => 'Дата добавления',
            'recommended'   => 'В разделе "Рекомендуемые товары"',
            'subCategories' => 'Подкатегории',
            'producer_id'   => 'Производитель',
            'opt_price'     => 'Оптовая цена',
            'rozn_price'    => 'Розничная цена',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;
        $criteria->with = array('category');
        if (!empty($this->subCategoryId)){
            $criteria->with[] = 'relProductSubcategories';
            $criteria->together = true;
            $criteria->compare('relProductSubcategories.sub_category_id', $this->subCategoryId);
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.name', $this->name, true);
        $criteria->compare('t.article', $this->article, true);
        $criteria->compare('t.status', $this->status);
        $criteria->compare('t.category_id', $this->category_id);
        $criteria->compare('t.producer_id', $this->producer_id);
        $criteria->compare('t.date_create', $this->date_create, true);
        $criteria->compare('t.recommended', $this->recommended);

        return $this->_getDataProvider($criteria);
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Product the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    protected function beforeSave()
    {
        if (empty($this->producer_id)) {
            $this->producer_id = null;
        }

        return parent::beforeSave();
    }

    protected function afterSave()
    {
        $this->addRelSubCategories();
        return parent::afterSave();
    }

    private function addRelSubCategories()
    {
        RelProductSubcategory::model()->deleteAll('product_id = ' . $this->id);
        if (empty($this->subCategories)) {
            return;
        }

        foreach ($this->subCategories as $sub) {
            $rel = new RelProductSubcategory();
            $rel->product_id = $this->id;
            $rel->sub_category_id = $sub;
            $rel->save(false);
        }
    }

    public function getLastProducts()
    {
        $criteria = new CDbCriteria();
        $criteria->limit = 9;
        $criteria->with = array('category');
        $criteria->order = 't.id DESC';
        return $this->findAll($criteria);
    }

    public function getRecommendedProducts()
    {
        $criteria = new CDbCriteria();
        $criteria->limit = 12;
        $criteria->with = array('category');
        $criteria->order = 't.id DESC';
        $criteria->compare('t.recommended', self::RECOMMENDED_YES);
        return $this->findAll($criteria);
    }

    public function getAllByCategory($categoryId)
    {
        $criteria = new CDbCriteria();
        $criteria->compare('t.category_id', $categoryId);
        return $this->_getDataProvider($criteria, 25);
    }

    public function getAllBySubCategory($subCategoryId)
    {
        $criteria = new CDbCriteria();
        $criteria->with = array('relProductSubcategories');
        $criteria->together = true;
        $criteria->compare('relProductSubcategories.sub_category_id', $subCategoryId);
        return $this->_getDataProvider($criteria);
    }

    /**
     * @param Product $productObj
     * @return $this[]
     */
    public function getRelatedProducts($productObj)
    {
        $criteria = new CDbCriteria();
        $criteria->limit = 4;
        $criteria->with = array('category');
        $criteria->addCondition('t.id != ' . $productObj->id);
        $criteria->compare('t.category_id', $productObj->category_id);

        return $this->findAll($criteria);
    }

    public function getPrice()
    {
        if (Yii::app()->user->isGross) {
            return !empty($this->opt_price) ? $this->opt_price : $this->rozn_price;
        } else {
            return !empty($this->rozn_price) ? $this->rozn_price : $this->opt_price;
        }
    }

    public function getLinkBasket()
    {
        return CHtml::link('<i class="fa fa-shopping-cart"></i> Добавить в корзину', 'javascript:;', array(
            'class'          => 'product-button',
            'data-productid' => $this->id,
            'data-price'     => $this->getPrice(),
            'onclick'        => 'basketObj.addToBasket($(this));'
        ));
    }

    public function getLinkAddBasket()
    {
        return CHtml::link('<i class="fa fa-shopping-cart"></i>', 'javascript:;', array(
            'class'          => 'button color',
            'data-productid' => $this->id,
            'data-price'     => $this->getPrice(),
            'onclick'        => 'basketObj.addToBasket($(this));'
        ));
    }

    public function getPictureLink()
    {
        $href = $this->picture;
        if (empty($href)) {
            $href = '/images/small_product_list_01.jpg';
        }

        $imageSmall = CHtml::image(Yii::app()->request->baseUrl .
            ImageHelper::thumb(68, 68, $href, array('method' => 'adaptiveResize')));

        $link = '/product/view/' . $this->id;
        return CHtml::link($imageSmall, $link);
    }
}

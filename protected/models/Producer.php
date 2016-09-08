<?php

/**
 * This is the model class for table "producer".
 *
 * The followings are the available columns in table 'producer':
 * @property string $id
 * @property string $name
 * @property string $category_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Product[] $products
 * @property Category $category
 * @property RelProducerSubCategory[] $relProducerSubCategories
 */
class Producer extends MyActiveRecord
{
    public $subCategories;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'producer';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('status', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 255),
            array('category_id', 'length', 'max' => 4),
            // The following rule is used by search().
            array('subCategories', 'safe'),
            // @todo Please remove those attributes that should not be searched.
            array('id, name, category_id, status', 'safe', 'on' => 'search'),
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
            'products'                 => array(self::HAS_MANY, 'Product', 'producer_id'),
            'category'                 => array(self::BELONGS_TO, 'Category', 'category_id'),
            'relProducerSubCategories' => array(self::HAS_MANY, 'RelProducerSubCategory', 'producer_id'),
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
            'category_id'   => 'Категория',
            'status'        => 'Статус',
            'subCategories' => 'Подкатегории'
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

        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.name', $this->name, true);
        $criteria->compare('t.category_id', $this->category_id);
        $criteria->compare('t.status', $this->status);

        return $this->_getDataProvider($criteria);
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Producer the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    protected function afterSave()
    {
        $this->_addRelSubCategory();
        return parent::afterSave();
    }

    private function _addRelSubCategory()
    {
        RelProducerSubCategory::model()->deleteAll('producer_id = ' . $this->id);
        if (empty($this->subCategories)){
            return;
        }

        foreach ($this->subCategories as $sub){
            $rel = new RelProducerSubCategory();
            $rel->producer_id = $this->id;
            $rel->sub_category_id = $sub;
            $rel->save(false);
        }
    }

    public function getListByCategory($categoryId)
    {
        if (empty($categoryId)){
            return array();
        }

        $data = $this->findAll('category_id = ' . (int)$categoryId);
        return CHtml::listData($data, 'id', 'name');
    }

    public function getListBySubCategory($subCategory)
    {
        $criteria = new CDbCriteria();
        $criteria->with = array('relProducerSubCategories');
        $criteria->compare('relProducerSubCategories.sub_category_id', $subCategory);
        $data = $this->findAll($criteria);
        return CHtml::listData($data, 'id', 'name');
    }
}

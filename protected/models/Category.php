<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property string $id
 * @property string $name
 * @property integer $status
 * @property string $picture
 *
 * The followings are the available model relations:
 * @property Product[] $products
 * @property SubCategory[] $subCategories
 */
class Category extends MyActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'category';
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
            array('picture', 'length', 'max' => 500),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, status, picture', 'safe', 'on' => 'search'),
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
            'products'      => array(self::HAS_MANY, 'Product', 'category_id'),
            'subCategories' => array(self::HAS_MANY, 'SubCategory', 'category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'      => 'ID',
            'name'    => 'Название',
            'status'  => 'Статус',
            'picture' => 'Изображение'
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
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('status', $this->status);

        return $this->_getDataProvider($criteria);
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Category the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return $this[]
     */
    public function getListWithSubCategory()
    {
        $criteria = new CDbCriteria();
        $criteria->with = array('subCategories');
        return $this->findAll($criteria);
    }
}

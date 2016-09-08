<?php

/**
 * This is the model class for table "rel_product_subcategory".
 *
 * The followings are the available columns in table 'rel_product_subcategory':
 * @property string $id
 * @property string $product_id
 * @property string $sub_category_id
 *
 * The followings are the available model relations:
 * @property Product $product
 * @property SubCategory $subCategory
 */
class RelProductSubcategory extends MyActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'rel_product_subcategory';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('product_id', 'length', 'max' => 10),
            array('sub_category_id', 'length', 'max' => 6),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, product_id, sub_category_id', 'safe', 'on' => 'search'),
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
            'product'     => array(self::BELONGS_TO, 'Product', 'product_id'),
            'subCategory' => array(self::BELONGS_TO, 'SubCategory', 'sub_category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'              => 'ID',
            'product_id'      => 'Product',
            'sub_category_id' => 'Sub Category',
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
        $criteria->compare('product_id', $this->product_id, true);
        $criteria->compare('sub_category_id', $this->sub_category_id, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return RelProductSubcategory the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}

<?php

/**
 * This is the model class for table "basket".
 *
 * The followings are the available columns in table 'basket':
 *
 * @property string  $id
 * @property string  $user_session
 * @property int     $user_id
 * @property string  $date_create
 * @property int     $product_id
 * @property float   $price
 * @property float   $single_price
 * @property int     $quantity
 *
 * The followings are the available model relations:
 * @property Product $product
 */
class Basket extends MyActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'basket';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return [
            ['user_id, product_id, quantity', 'numerical', 'integerOnly' => true],
            ['user_session, product_id, quantity', 'length', 'max' => 10],
            ['price, single_price', 'length', 'max' => 12],
            ['date_create', 'safe'],
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            [
                'id, user_session, date_create, product_id, price, quantity, user_id, single_price',
                'safe',
                'on' => 'search'
            ],
        ];
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return [
            'product' => [self::BELONGS_TO, 'Product', 'product_id'],
            'user'    => [self::BELONGS_TO, 'User', 'user_id'],
        ];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return [
            'id'           => 'ID',
            'user_session' => 'Сессия',
            'user_id'      => 'Пользователь',
            'date_create'  => 'Дата создания',
            'product_id'   => 'Товар',
            'price'        => 'Сумма',
            'single_price' => 'Цена',
            'quantity'     => 'Кол-во',
        ];
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
        $criteria->compare('user_session', $this->user_session, true);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('date_create', $this->date_create, true);
        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('price', $this->price, true);
        $criteria->compare('quantity', $this->quantity);

        return new CActiveDataProvider($this, [
            'criteria' => $criteria,
        ]);
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     *
     * @param string $className active record class name.
     *
     * @return Basket the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    protected function beforeSave()
    {
        if ($this->isNewRecord) {
            $this->date_create = date('Y-m-d H:i:s');
            if (!empty(Yii::app()->user->id)) {
                $this->user_id = Yii::app()->user->id;
            }

            $this->quantity = 1;
        }

        return parent::beforeSave();
    }

    public function findRowByProduct($productId)
    {
        $criteria = new CDbCriteria();
        $criteria->compare('product_id', $productId);
        if (!empty(Yii::app()->user->id)) {
            $criteria->compare('user_id', Yii::app()->user->id);
        } else {
            $criteria->compare('user_session', Yii::app()->user->getState('uniqueCode'));
        }

        return $this->find($criteria);
    }

    public function addNewRecord($productId, $price)
    {
        $model = new self();
        $model->user_session = Yii::app()->user->getState('uniqueCode');
        $model->product_id = $productId;
        $model->price = $price;
        $model->single_price = $price;
        $model->save(false);
    }

    /**
     * @return Basket[]
     */
    public function getMyBasket()
    {
        $criteria = new CDbCriteria();
        $criteria->with = ['product' => ['select' => 'name']];

        $userId = Yii::app()->user->id;
        if (!empty($userId)) {
            $criteria->compare('t.user_id', $userId);
        } else {
            $criteria->compare('t.user_session', Yii::app()->user->getState('uniqueCode'));
        }

        return $this->findAll($criteria);
    }

    public function getMyBasketProducts()
    {
        return CHtml::listData($this->getMyBasket(), 'product_id', 'product_id');
    }

    public function getSumAndCount()
    {
        $basket = Basket::model()->getMyBasket();
        $count = 0;
        $sum = 0;
        foreach ($basket as $bask) {
            $count += $bask->quantity;
            $sum += $bask->price;
        }

        return [$count, $sum];
    }
}

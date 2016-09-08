<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property string $id
 * @property string $date_create
 * @property integer $status
 * @property string $comment
 * @property string $user_session
 * @property string $user_id
 * @property string $email
 * @property string $fio
 * @property string $phone
 * @property string $area
 * @property string $city
 * @property string $address
 * @property string $price
 *
 * The followings are the available model relations:
 * @property User $user
 * @property RelOrderProduct[] $relOrderProducts
 */
class Order extends MyActiveRecord
{
    const STATUS_NEW = 1;
    const STATUS_REJECTED = 2;
    const STATUS_SENDING = 3;
    const STATUS_PURCHASED = 4;
    const STATUS_RETURN = 5;

    public $verifyCode;
    public $products;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'order';
    }

    public static function getStatus($status = null)
    {
        $array = array(
            self::STATUS_NEW       => 'Новый',
            self::STATUS_REJECTED  => 'Отклонен',
            self::STATUS_SENDING   => 'На отправке',
            self::STATUS_PURCHASED => 'Выкуплен',
            self::STATUS_RETURN    => 'Возврат'
        );

        return !empty($status) ? MyArray::get($array, $status) : $array;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements(), 'on' => 'validateCaptcha'),
            array('fio, phone', 'required'),
            array('status', 'numerical', 'integerOnly' => true),
            array('comment, address', 'length', 'max' => 500),
            array('user_session', 'length', 'max' => 32),
            array('user_id, area', 'length', 'max' => 10),
            array('email', 'length', 'max' => 100),
            array('fio', 'length', 'max' => 200),
            array('phone', 'length', 'max' => 15),
            array('city', 'length', 'max' => 255),
            array('date_create, price', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, date_create, status, comment, user_session, user_id, email, fio, phone, area,
                city, address, price', 'safe', 'on' => 'search'),
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
            'user'             => array(self::BELONGS_TO, 'User', 'user_id'),
            'relOrderProducts' => array(self::HAS_MANY, 'RelOrderProduct', 'order_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'           => '№ заказа',
            'date_create'  => 'Дата создания',
            'status'       => 'Статус',
            'comment'      => 'Комментарий',
            'user_session' => 'Сессия',
            'user_id'      => 'ID пользователя',
            'email'        => 'Email',
            'fio'          => 'ФИО',
            'phone'        => 'Телефон',
            'area'         => 'Область',
            'city'         => 'Город',
            'address'      => 'Адрес',
            'price'        => 'Цена заказа',
            'verifyCode'   => 'Код проверки',
            'products'     => 'Товары'
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('date_create', $this->date_create, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('user_session', $this->user_session, true);
        $criteria->compare('user_id', $this->user_id, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('fio', $this->fio, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('area', $this->area, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('price', $this->price, true);

        return $this->_getDataProvider($criteria);
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Order the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    protected function beforeSave()
    {
        if ($this->isNewRecord) {
            $this->date_create = new CDbExpression('NOW()');
            $this->status = self::STATUS_NEW;
            $this->_setProducts();
        }

        return parent::beforeSave();
    }

    protected function afterSave()
    {
        $this->_addRelProducts();
        return parent::afterSave();
    }

    private function _setProducts()
    {
        $basket = Basket::model()->getMyBasket();
        if (empty($basket)) {
            return;
        }

        $sumOrder = 0;
        $userSession = null;
        $userId = null;
        foreach ($basket as $prod) {
            $this->products[] = array(
                'id'       => $prod->product_id,
                'price'    => $prod->single_price,
                'quantity' => $prod->quantity
            );

            $sumOrder += $prod->price;
            $this->user_session = $prod->user_session;
            $this->user_id = $prod->user_id;

            Basket::model()->deleteByPk($prod->id);
        }

        $this->price = $sumOrder;
    }

    private function _addRelProducts()
    {
        if (empty($this->products)) {
            return;
        }

        foreach ($this->products as $prod) {
            $rel = new RelOrderProduct();
            $rel->order_id = $this->id;
            $rel->product_id = $prod['id'];
            $rel->price = $prod['price'];
            $rel->quantity = $prod['quantity'];
            $rel->save(false);
        }
    }
}

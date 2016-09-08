<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $email
 * @property string $password
 * @property string $fio
 * @property string $phone
 * @property string $area
 * @property string $city
 * @property string $address
 * @property integer $status
 * @property string $role
 *
 * The followings are the available model relations:
 * @property Order[] $orders
 */
class User extends MyActiveRecord
{
    const STATUS_MODERATE = 2;
    const STATUS_BANNED = 3;

    const ADMIN = 1;
    const WHOLESALE = 2;

    public $confirmPassword;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'user';
    }

    public static function getStatus($status = null)
    {
        $array = array(
            self::STATUS_ACTIVE   => 'Активный',
            self::STATUS_MODERATE => 'На модерации',
            self::STATUS_BANNED   => 'Заблокирован'
        );

        return !empty($status) ? CHtml::value($array, $status) : $array;
    }

    public function getRoles($role = null)
    {
        $array = array(
            self::ADMIN     => 'Администратор',
            self::WHOLESALE => 'Покупатель'
        );

        return !empty($role) ? CHtml::value($array, $role) : $array;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email', 'unique'),
            array('email, phone, fio', 'required'),
            array('status', 'numerical', 'integerOnly' => true),
            array('phone', 'numerical'),
            array('email', 'length', 'max' => 100),
            array('password', 'length', 'max' => 50),
            array('fio', 'length', 'max' => 200),
            array('phone', 'length', 'max' => 15),
            array('area', 'length', 'max' => 10),
            array('city', 'length', 'max' => 255),
            array('address', 'length', 'max' => 500),
            array('role', 'length', 'max' => 2),
            array('email', 'email'),
            array('confirmPassword', 'equalPassword'),
            array('confirmPassword', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, email, password, fio, phone, area, city, address, status, role', 'safe', 'on' => 'search'),
        );
    }

    public function equalPassword()
    {
        if ($this->password != $this->confirmPassword) {
            $this->addError('confirmPassword', 'Введенные пароли не совпадают');
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'orders' => array(self::HAS_MANY, 'Order', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'              => 'ID',
            'email'           => 'Email',
            'password'        => 'Пароль',
            'fio'             => 'ФИО',
            'phone'           => 'Телефон',
            'area'            => 'Область',
            'city'            => 'Город',
            'address'         => 'Адрес',
            'status'          => 'Статус',
            'role'            => 'Роль',
            'confirmPassword' => 'Повторите пароль'
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
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('fio', $this->fio, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('area', $this->area, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('role', $this->role, true);

        return $this->_getDataProvider($criteria);
    }

    protected function beforeSave()
    {
        if ($this->isNewRecord) {
            if (empty($this->role)) {
                $this->role = self::WHOLESALE;
            }
        }

        $this->_setNewPassword();
        return parent::beforeSave();
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    protected function _setNewPassword()
    {
        $model = $this->findByPk($this->id);
        $trim = trim($this->password);

        if (!empty($model)) {
            if (!empty($trim)) {
                $this->password = md5($trim);
            } else {
                $this->password = $model->password;
            }
        } else {
            $this->password = md5($trim);
        }
    }
}

<?php

/**
 * This is the model class for table "settings".
 *
 * The followings are the available columns in table 'settings':
 *
 * @property integer $id
 * @property string  $name
 * @property string  $text
 */
class Settings extends MyActiveRecord
{
    const OFFLINE_ORDER = 1;
    const CATALOGS = 2;
    const DELIVERY = 3;
    const ABOUT_COMPANY = 4;
    const OUR_ADDRESS = 5;
    const PHONES = 6;
    const CERTIFICATES = 7;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'settings';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return [
            ['text, name', 'safe'],
            ['id, name, text', 'safe', 'on' => 'search'],
        ];
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return [];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return [
            'id'   => 'ID',
            'text' => 'Текст',
            'name' => 'Название'
        ];
    }

    public function search()
    {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('text', $this->text, true);
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider($this, [
            'criteria' => $criteria,
        ]);
    }

    /**
     * @param string $className
     *
     * @return Settings
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function getText($id)
    {
        $model = $this->findByPk($id);

        return !empty($model) ? $model->text : null;
    }
}

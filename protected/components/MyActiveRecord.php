<?php

class MyActiveRecord extends CActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 2;

    /**
     * @param mixed $pk
     * @param string $condition
     * @param array $params
     *
     * @return $this
     */
    public function findByPk($pk, $condition = '', $params = array())
    {
        return parent::findByPk($pk, $condition, $params);
    }

    /**
     * @param string $condition
     * @param array $params
     *
     * @return $this
     */
    public function find($condition = '', $params = array())
    {
        return parent::find($condition, $params);
    }

    /**
     * @param string $condition
     * @param array $params
     *
     * @return $this[]
     */
    public function findAll($condition = '', $params = array())
    {
        return parent::findAll($condition, $params);
    }

    /**
     * @param array $attributes
     * @param string $condition
     * @param array $params
     *
     * @return $this[]
     */
    public function findAllByAttributes($attributes, $condition = '', $params = array())
    {
        return parent::findAllByAttributes($attributes, $condition, $params);
    }

    /**
     * @param array $attributes
     * @param string $condition
     * @param array $params
     *
     * @return $this
     */
    public function findByAttributes($attributes, $condition = '', $params = array())
    {
        return parent::findByAttributes($attributes, $condition, $params);
    }

    /**
     * @param string $field
     * @return array
     */
    public function getList($field = 'name')
    {
        return CHtml::listData($this->findAll(), 'id', $field);
    }

    public static function getStatus($status = null)
    {
        $array = array(
            self::STATUS_ACTIVE    => 'Активный',
            self::STATUS_NO_ACTIVE => 'Не активный'
        );

        return !empty($status) ? MyArray::get($array, $status) : $array;
    }

    protected function _getDataProvider($criteria, $pageSize = 25)
    {
        return new CActiveDataProvider($this, array(
            'criteria'   => $criteria,
            'pagination' => array(
                'pageSize' => $pageSize
            ),
            'sort' => array(
                'defaultOrder' => 't.id DESC'
            )
        ));
    }

    public function getPicture($width = 68, $height = 68)
    {
        $href = $this->picture;
        if (empty($href)) {
            $href = '/images/small_product_list_01.jpg';
        }

        $imageSmall = CHtml::image(Yii::app()->request->baseUrl .
            ImageHelper::thumb($width, $height, $href, array('method' => 'adaptiveResize')));

        $image = Yii::app()->request->baseUrl . $href;
        return CHtml::link($imageSmall, $image, array('class' => 'single_image'));
    }
}
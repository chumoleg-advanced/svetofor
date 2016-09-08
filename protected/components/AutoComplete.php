<?php

class AutoComplete
{

    /**
     * Автокомплит инпута
     *
     * @param        $model - Модель данных
     * @param        $class - Модель, где искать
     * @param        $field - поле, которое искать
     * @param string $url   - метод-обработчик
     *
     * @return mixed
     */
    public static function get($model, $class, $field, $url = '/ajax/index/autoComplete')
    {
        $widget = new CWidget();

        $complete = $widget->widget(
            'zii.widgets.jui.CJuiAutoComplete', array(
                'model'       => $model,
                'attribute'   => $field,
                'source'      => Yii::app()->createUrl($url, array('class' => $class, 'field' => $field)),
                'options'     => array(
                    'minChars' => '1',
                    'showAnim' => 'fold',
                ),
                'htmlOptions' => array(
                    'size' => 2,
                )
            ), true
        );

        return $complete;
    }
}
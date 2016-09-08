<?php

class MyJson
{
    /**
     * @param null $html
     */
    public static function answerHtml($html = null)
    {
        echo CJSON::encode(array('status' => 'ok', 'html' => $html));
        Yii::app()->end();
    }

    public static function answerError($msg)
    {
        echo CJSON::encode(array('status' => 'error', 'msg' => $msg));
        Yii::app()->end();
    }
}
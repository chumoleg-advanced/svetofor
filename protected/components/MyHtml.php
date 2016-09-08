<?php

class MyHtml extends CHtml
{
    public static function tag($tag, $content = false, $htmlOptions = array(), $closeTag = true)
    {
        return parent::tag($tag, $htmlOptions, $content, $closeTag);
    }
}
<?php

class MyButtonColumn extends CButtonColumn
{
    public $template = '{update} {delete}';
    public $htmlOptions = array('align' => 'center');
}

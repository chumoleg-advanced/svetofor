<?php
$config = dirname(__FILE__) . '/protected/config/main.php';

//define('YII_DEBUG', false);

define('YII_DEBUG', true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
$yii = dirname(__FILE__) . '/framework/yii.php';

require_once($yii);
Yii::createWebApplication($config)->run();
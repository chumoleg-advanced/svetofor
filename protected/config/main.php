<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'       => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name'           => 'Svetofor.ru',

    // preloading 'log' component
    'preload'        => array('log'),

    'sourceLanguage' => 'en',
    'language'       => 'ru',

    // autoloading model and component classes
    'import'         => array(
        'application.models.*',
        'application.models.Form.*',
        'application.components.*',
        'application.extensions.chosen.*'
    ),

    'modules'        => array(
        'siteAdmin' => array('defaultController' => 'order'),
        'gii'       => array(
            'class'     => 'system.gii.GiiModule',
            'password'  => 'svetofor123',
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),

    // application components
    'components'     => array(
        'widgetFactory' => array(
            'widgets' => array(
                'CListView'      => array(
                    'summaryText'   => '{start}&mdash;{end} из {count}',
                    'pagerCssClass' => 'pagination',
                    'pager'         => array(
                        'cssFile'              => false,
                        'selectedPageCssClass' => 'active',
                        'hiddenPageCssClass'   => 'disabled',
                        'header'               => '',
                        'firstPageLabel'       => '&lt;&lt;',
                        'prevPageLabel'        => '&lt;',
                        'nextPageLabel'        => '&gt;',
                        'lastPageLabel'        => '&gt;&gt;',
                        'maxButtonCount'       => '5',
                    ),
                    'template'      => '{summary}{items}<div class="clearfix">&nbsp;</div>{pager}'
                ),
                'CGridView'      => array(
                    'summaryText'   => 'Всего: {count}',
                    'pagerCssClass' => 'pagination',
                    'itemsCssClass' => 'cart-table responsive-table',
                    'pager'         => array(
                        'cssFile'              => false,
                        'selectedPageCssClass' => 'active',
                        'hiddenPageCssClass'   => 'disabled',
                        'header'               => '',
                        'firstPageLabel'       => '&lt;&lt;',
                        'prevPageLabel'        => '&lt;',
                        'nextPageLabel'        => '&gt;',
                        'lastPageLabel'        => '&gt;&gt;',
                        'maxButtonCount'       => '5',
                    ),
                    'template'      => '{summary}{items}<div class="clearfix">&nbsp;</div>{pager}'
                ),
                'CJuiDatePicker' => array(
                    'language'    => 'ru',
                    'options'     => array(
                        'changeMonth' => true,
                        'changeYear'  => true,
                        'dateFormat'  => 'yy-mm-dd',
                        'yearRange'   => '2012:' . date('Y')
                    ),
                    'htmlOptions' => array(
                        'size' => 15
                    )
                ),
            ),
        ),

        'user'          => array(
            'allowAutoLogin' => true,
            'loginUrl'       => '/',
            'class'          => 'WebUser'
        ),

        'urlManager'    => array(
            'urlFormat'      => 'path',
            'showScriptName' => false,
            'rules'          => array(
                '<controller:\w+>/<id:\d+>'                        => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'           => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>'                    => '<controller>/<action>',

                'siteAdmin/<controller:\w+>/<action:\w+>/<id:\d+>' => 'siteAdmin/<controller>/<action>',
            ),
        ),

        'db'            => array(
            'connectionString'   => 'mysql:host=localhost;dbname=svetofor',
            'emulatePrepare'     => true,
            'username'           => 'root',
            'password'           => '',
            'charset'            => 'utf8',
            'enableProfiling'    => true,
            'enableParamLogging' => true,
        ),

        'errorHandler'  => array(
            'errorAction' => 'site/error',
        ),
        'log'           => array(
            'class'  => 'CLogRouter',
            'routes' => array(
                array(
                    'class'  => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'         => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);
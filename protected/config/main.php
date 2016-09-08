<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return CMap::mergeArray([
    'basePath'       => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name'           => 'Svetofor.ru',
    'preload'        => ['log'],
    'sourceLanguage' => 'en',
    'language'       => 'ru',
    'import'         => [
        'application.models.*',
        'application.models.Form.*',
        'application.components.*',
        'application.extensions.chosen.*'
    ],
    'modules'        => [
        'siteAdmin' => ['defaultController' => 'order'],
    ],
    // application components
    'components'     => [
        'widgetFactory' => [
            'widgets' => [
                'CListView'      => [
                    'summaryText'   => '{start}&mdash;{end} из {count}',
                    'pagerCssClass' => 'pagination',
                    'pager'         => [
                        'cssFile'              => false,
                        'selectedPageCssClass' => 'active',
                        'hiddenPageCssClass'   => 'disabled',
                        'header'               => '',
                        'firstPageLabel'       => '&lt;&lt;',
                        'prevPageLabel'        => '&lt;',
                        'nextPageLabel'        => '&gt;',
                        'lastPageLabel'        => '&gt;&gt;',
                        'maxButtonCount'       => '5',
                    ],
                    'template'      => '{summary}{items}<div class="clearfix">&nbsp;</div>{pager}'
                ],
                'CGridView'      => [
                    'summaryText'   => 'Всего: {count}',
                    'pagerCssClass' => 'pagination',
                    'itemsCssClass' => 'cart-table responsive-table',
                    'pager'         => [
                        'cssFile'              => false,
                        'selectedPageCssClass' => 'active',
                        'hiddenPageCssClass'   => 'disabled',
                        'header'               => '',
                        'firstPageLabel'       => '&lt;&lt;',
                        'prevPageLabel'        => '&lt;',
                        'nextPageLabel'        => '&gt;',
                        'lastPageLabel'        => '&gt;&gt;',
                        'maxButtonCount'       => '5',
                    ],
                    'template'      => '{pager}<div class="clearfix">&nbsp;</div>{summary}{items}<div class="clearfix">&nbsp;</div>{pager}'
                ],
                'CJuiDatePicker' => [
                    'language'    => 'ru',
                    'options'     => [
                        'changeMonth' => true,
                        'changeYear'  => true,
                        'dateFormat'  => 'yy-mm-dd',
                        'yearRange'   => '2012:' . date('Y')
                    ],
                    'htmlOptions' => [
                        'size' => 15
                    ]
                ],
            ],
        ],
        'user'          => [
            'allowAutoLogin' => true,
            'loginUrl'       => '/',
            'class'          => 'WebUser'
        ],
        'urlManager'    => [
            'urlFormat'      => 'path',
            'showScriptName' => false,
            'rules'          => [
                '<controller:\w+>/<id:\d+>'                        => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'           => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>'                    => '<controller>/<action>',
                'siteAdmin/<controller:\w+>/<action:\w+>/<id:\d+>' => 'siteAdmin/<controller>/<action>',
            ],
        ],
        'db'            => [
            'emulatePrepare'     => true,
            'charset'            => 'utf8',
            'enableProfiling'    => true,
            'enableParamLogging' => true,
        ],
        'errorHandler'  => [
            'errorAction' => 'site/error',
        ],
        'log'           => [
            'class'  => 'CLogRouter',
            'routes' => [
                [
                    'class'  => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ],
            ],
        ],
    ],
    'params'         => [
        'adminEmail' => 'webmaster@example.com',
    ],
], require_once('main-local.php'));
<?php

return CMap::mergeArray([
    'basePath'   => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name'       => 'My Console Application',
    'preload'    => ['log'],
    'import'     => [
        'application.models.*',
        'application.components.*',
        'application.extensions.chosen.*'
    ],
    'components' => [
        'db'  => [
            'emulatePrepare' => true,
            'charset'        => 'utf8',
        ],
        'log' => [
            'class'  => 'CLogRouter',
            'routes' => [
                [
                    'class'  => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ],
            ],
        ],
    ],
], require_once('main-local.php'));
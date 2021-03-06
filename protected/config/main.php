<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'M.Video newsparer tool',

    'language' => 'ru',

    'preload' => array('log'),

    'import' => array(
        'application.models.*',
        'application.components.*',
    ),

    'modules' => array('email', 'newspaper', 'promo'),

    'components' => array(

        'session' => array(
            'autoStart' => false,
        ),

        'decoda' => array(
            'class' => 'ext.decoda.YiiDecoda',
            'defaults' => true,
        ),

        'user' => array(
            'class' => 'WebUser',
            'loginUrl' => array('/login'),
            'allowAutoLogin' => true,
        ),

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(

                'login' => 'auth/login',
                'logout' => 'auth/logout',

                '<module:\w+>/<controller:\w+>/<action:[0-9a-zA-Z_\-]+>/<id:\d+>' => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:[0-9a-zA-Z_\-]+>' => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>' => '<module>/<controller>/index',

                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>/id/<id>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),

        'import' => array(
            'class' => 'application.modules.email.components.Import.Import'
        ),

        'db' => require(dirname(__FILE__) . '/db.php'),

        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),

        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
);
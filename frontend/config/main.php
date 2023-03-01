<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'frontend',
    'homeUrl' => '/',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'auth' => [
            'class' => 'yeesoft\auth\AuthModule',
        ],
    ],
    'components' => [
        'assetManager' => [
    'bundles' => [
        'yii\web\JqueryAsset' => [
            'js'=>[]
        ],
        'yii\bootstrap\BootstrapPluginAsset' => [
            'js'=>[]
        ],
        // 'yii\bootstrap\BootstrapAsset' => [
        //     'css' => [],
        // ],

    ],
],
        'view' => [
            // 'theme' => [
            //     'class' => 'frontend\components\Theme',
            //     'theme' => 'readable', //cerulean, cosmo, default, flatly, readable, simplex, united
            // ],
            'as seo' => [
                'class' => 'yeesoft\seo\components\SeoViewBehavior',
            ]
        ],
        'seo' => [
            'class' => 'yeesoft\seo\components\Seo',
        ],
        'request' => [
            'baseUrl' => '',
        ],
        'urlManager' => [
            'class' => 'yeesoft\web\MultilingualUrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules' => array(
                '<module:auth>/<action:(logout|captcha)>' => '<module>/default/<action>',
                '<module:auth>/<action:(oauth)>/<authclient:\w+>' => '<module>/default/<action>',
            ),
            'multilingualRules' => [
                '<lang:(zh|id|enz)>' => 'site/index',
                '<module:auth>/<action:\w+>' => '<module>/default/<action>',
                '<lang:(zh|id|en)>/<controller:(service|article)>/<id:\w+>' => '<controller>/index',
                '<lang:(zh|id|en)>/<controller:(agent)>/<id:\w+>' => '<controller>/agent',
                '<controller:(service|article)>/<id:\w+>' => '<controller>/index',
                '<controller:(agent)>/<id:\w+>' => '<controller>/agent',
                '/homepage' => 'site/index/',
                '/' => 'site/index/',
                '<lang:(zh|id|en)>/<controller>/' => '<controller>/index',
                '<controller>/' => '<controller>/index',
                '<action:[\w \-]+>' => 'site/<action>',
                '<lang:(zh|id|en)>/<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
            'nonMultilingualUrls' => [
                'auth/default/oauth',
            ],
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];

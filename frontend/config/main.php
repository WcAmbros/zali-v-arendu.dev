<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [

        'profile' => [
            'class' => 'common\models\Profile'
        ],
        'region' => [
            'class' => 'frontend\models\Region'
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error'],
                    'logFile' => '@app/runtime/logs/web-error.log'
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['warning'],
                    'logFile' => '@app/runtime/logs/web-warning.log'
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<_a:(login|logout|signup|confirm-email|request-password-reset|reset-password)>' => 'user/<_a>',
                '<_a:(about|contact|banner)>' => 'site/<_a>',
                'hall/<_a:(create|captcha|search)>'=>'hall/<_a>',
                'hall/update/<id:\d+>'=>'hall/update',

                'profile' => 'profile/update',
                'ajax/<_a:[\w\-]+>' => 'ajax/<_a>',
                'ajax/removeimage/<id:\d+>' => 'ajax/removeimage',

                '<_c:[\w\-]+>/<_a:[\w\-]+>/<id:\d+>' => '<_c>/<_a>',
                '<alias>'=>'hall/category',
                '<category>/<hall>'=>'hall/view',
            ],
        ],
    ],
    'params' => $params,
];

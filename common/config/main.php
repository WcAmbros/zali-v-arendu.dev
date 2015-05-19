<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'ru',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=zali_v_arendu',
            'username' => 'zali_v_arendu',
            'password' => 'Wcambros88',
            'charset' => 'utf8',
        ],
        'cache' => [
            'class' => 'yii\caching\DummyCache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
        ],
        'log' => [
            'class' => 'yii\log\Dispatcher',
        ]
    ],
];

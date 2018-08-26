<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'lamoric',
    'name' => 'Lamoric',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'layout' => '@app/views/layouts/main/main.php',
    'language'=>'pl',
    'sourceLanguage' => 'en',
    'components' => [
        ///// podmiana globalnie jquery
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => [
                        'js/jquery-2.1.4.min.js',
                    ]
                ],
            ],
        ],
        ///////////
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'mnAbzUKx8D2LX4Ft0P5MIj37EsdERP6B',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\DbTarget',
                    'categories' => ['trace\*'],
                    'levels' => ['info'],
                    'logVars' => [],
                    'prefix' => function ($message) {
                        $ip = Yii::$app->getRequest()->getUserIP();
                        return "IP[$ip]";
                    }
                ],
            ],
        ],
        'db' => $db,
        'i18n' => [
            'translations' => [
               'app*' => [
                   'class' => 'yii\i18n\PhpMessageSource',
                   'basePath' => '@app/messages/AppicationTranslations',
                   'sourceLanguage' => 'en',
                   'fileMap' => [
                       'app' => 'app.php',
                   ],
               ],
               'db*' => [
                   'class' => 'yii\i18n\PhpMessageSource',
                   'basePath' => '@app/messages/DbLabelTranslations',
                   'sourceLanguage' => 'en',
                   'fileMap' => [
                       'db/company' => 'company.php',
                       'db/member' => 'member.php',
                       'db/workplace' => 'workplace.php',
                       'db/authuser' => 'authuser.php',
                       'db/document' => 'document.php',
                       'db/category' => 'category.php',
                       'db/log' => 'log.php',
                       'db/balanceaccount' => 'balanceaccount.php',
                       'db/balancetransaction' => 'balancetransaction.php',
                       'db/event' => 'event.php',
                   ],
               ],
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user'
                ],
            ],
        ],
        'CustomUtil' => [
            'class' => 'app\components\CustomUtil'
        ],
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            'on '.\yii\web\User::EVENT_AFTER_LOGIN => ['app\components\EventHandler', 'AfterLogin'],
            'on '.\yii\web\User::EVENT_AFTER_LOGOUT => ['app\components\EventHandler', 'AfterLogout'],
        ],
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'PLN',
       ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'docmgm/article-ovw/article-index' => 'docmgm/document-ovw/article-index',
            ],
        ],
        'balanceManager' => [
            'class' => 'yii2tech\balance\ManagerDb',
            'accountTable' => '{{%balance_account}}',
            'transactionTable' => '{{%balance_transaction}}',
            'accountLinkAttribute' => 'account_id',
            'amountAttribute' => 'amount',
            'dataAttribute' => 'data',
        ],
        
    ],
    'controllerMap' => [
        'file' => 'mdm\\upload\\FileController', // use to show or download file
        'elfinder' => [
            'class' => 'mihaildev\elfinder\Controller',
            'access' => ['@'], 
            'disabledCommands' => ['netmount'], //disabling unnecessary commands https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#commands
            'roots' => [
                [
                    'baseUrl'=>'@web',
                    'basePath'=>'@webroot',
                    'path' => 'media/upload/documents/article_files',
                    'name' => 'Pliki'
                ],
            ],
           
        ]
    ],
    'modules' => [
        'docmgm' => [
            'class' => 'app\modules\docmgm\DocmgmModule',
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
        'treemanager' =>  [
            'class' => '\kartik\tree\Module',
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableRegistration' => false,
            'enableConfirmation' => false,
            'rememberFor' => '3600', // 1 hour
            'adminPermission' => 'Application Admin',
            //'admins' => ['root'],
            'controllerMap' => [
                'security' => 'app\controllers\user\SecurityController',
                'recovery' => 'app\controllers\user\RecoveryController',
            ],
            'modelMap' => [
                'Profile' => 'app\models\user\Profile',
                'User' => 'app\models\user\User',
            ],
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',
    ],
    'params' => $params,
];


if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;

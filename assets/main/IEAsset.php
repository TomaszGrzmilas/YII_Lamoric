<?php
namespace app\assets\main;

use yii\web\AssetBundle;

class IEAsset extends AssetBundle
{
    public $basePath = '@webroot/layout.main';
    public $baseUrl = '@web/layout.main';

    public $js = [
        'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js',
        'https://oss.maxcdn.com/respond/1.4.2/respond.min.js'
        ];

    public $cssOptions = [
        'condition' => 'IE 9',
    ];

    public $depends = [
        'app\assets\main\MainAsset',
    ];

    
}

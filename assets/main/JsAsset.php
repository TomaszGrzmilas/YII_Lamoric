<?php
namespace app\assets\main;

use yii\web\AssetBundle;

class JsAsset extends AssetBundle
{
    public $basePath = '@webroot/layout.main';
    public $baseUrl = '@web/layout.main';

    public $js = [
        'javascripts/jquery-2.1.4.min.js',
        'javascripts/bootstrap.min.js',
    ];

    public $depends = [
        'app\assets\main\MainAsset',
    ];
    
}

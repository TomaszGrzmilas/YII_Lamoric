<?php
namespace app\assets\main;

use yii\web\AssetBundle;

class MainAsset extends AssetBundle
{
    public $basePath = '@webroot/layout.main';
    public $baseUrl = '@web/layout.main';

    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css',
        'css/bootstrap.min.css',
        'css/lightbox.css',
        'css/hover.css',
        'css/default.css'
    ];

    public $js = [
        'javascripts/lightbox.js',
        'javascripts/scripts.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    
}

<?php
namespace app\assets\main;

use yii\web\AssetBundle;

class Base2Asset extends AssetBundle
{
    public $basePath = '@webroot/layout.main';
    public $baseUrl = '@web/layout.main';

    public $js = [
        'javascripts/bootstrap.min.js',
        'javascripts/lightbox.js',
        'javascripts/scripts.js',
        //'javascripts/_jquery-1.11.0.min.js',
        'javascripts/jquery-2.1.4.min.js',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
    ];
    
    public $depends = [
        'app\assets\main\BaseAsset',
    ];
    
}

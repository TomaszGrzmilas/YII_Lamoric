<?php
namespace app\assets\main;

use yii\web\AssetBundle;

class Base2Asset extends AssetBundle
{
    public $basePath = '@webroot/ace_assets';
    public $baseUrl = '@web/ace_assets';

    public $js = [
        'javascripts/bootstrap.min.js',
        'javascripts/lightbox.js',
        'javascripts/scripts.js',
        'javascripts/_jquery-1.11.0.min.js',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
    ];
    
    public $depends = [
        'app\assets\BaseAsset',
    ];
    
}

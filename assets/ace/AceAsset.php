<?php
namespace app\assets\ace;

use yii\web\AssetBundle;

class AceAsset extends AssetBundle
{
    public $basePath = '@webroot/ace_assets';
    public $baseUrl = '@web/ace_assets';

    public $js = [
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
        'js/ace.min.js',
    ];

    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css',
        'css/ace.css',
        'css/fonts.googleapis.com.css',
    ];
    
    public $depends = [
        'app\assets\BaseAsset',
    ];

    
}

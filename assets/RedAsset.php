<?php
namespace app\assets;

use yii\web\AssetBundle;

class RedAsset extends AssetBundle
{
    public $basePath = '@webroot/ace_assets_red';
    public $baseUrl = '@web/ace_assets_red';
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css',
        'css/ace.css',
        'css/fonts.googleapis.com.css',
    ];
    
    public $depends = [
        'app\assets\BaseAsset',
    ];

    
}

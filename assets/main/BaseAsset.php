<?php
namespace app\assets\main;

use yii\web\AssetBundle;

class BaseAsset extends AssetBundle
{
    public $basePath = '@webroot/layout.main';
    public $baseUrl = '@web/layout.main';
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    
}

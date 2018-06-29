<?php
namespace app\assets;

use yii\web\AssetBundle;

class Base2Asset extends AssetBundle
{
    public $basePath = '@webroot/ace_assets';
    public $baseUrl = '@web/ace_assets';

    public $js = [
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
    ];
    
    public $depends = [
        'app\assets\BaseAsset',
    ];
    
}

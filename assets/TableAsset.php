<?php
namespace app\assets;

use yii\web\AssetBundle;

class TableAsset extends AssetBundle
{
    public $basePath = '@webroot/ace_assets';
    public $baseUrl = '@web/ace_assets';
    public $css = [
       // 'css/bootstrap.css',
      //  'font-awesome/4.5.0/css/font-awesome.min.css',
    //    'css/ace.css',
     //   'css/fonts.googleapis.com.css',
    ];
    public $js = [
        'js/popper.min.js',
        'js/bootstrap.min.js', //panel zalogowany
        'js/ace.min.js', //menu
    ];
    
    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
         'app\assets\BaseAsset',
    ];
    
}

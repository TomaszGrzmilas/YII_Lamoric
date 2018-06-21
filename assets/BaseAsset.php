<?php
namespace app\assets;

use yii\web\AssetBundle;

class BaseAsset extends AssetBundle
{
    public $basePath = '@webroot/ace_assets';
    public $baseUrl = '@web/ace_assets';
    public $css = [
      //  'css/bootstrap.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css',
        'css/ace.css',
        'css/fonts.googleapis.com.css',
      
    //   'css/ace-skins.min.css',
    //   'css/ace-rtl.min.css'
    ];
    public $js = [
     //    'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js',
   //     'js/popper.min.js',
     //  'js/bootstrap.min.js', //panel zalogowany
     //   'js/popper.min.js', 
       'js/ace.min.js', //menu
    //  'js/jquery-ui.custom.min.js',
    //  'js/jquery.ui.touch-punch.min.js',
    //  'js/jquery.easypiechart.min.js',
    //  'js/jquery.sparkline.index.min.js',
    //  'js/jquery.flot.min.js',
    //  'js/jquery.flot.pie.min.js',
    //  'js/jquery.flot.resize.min.js',
    //  'js/ace-elements.min.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',

    ];
    
}

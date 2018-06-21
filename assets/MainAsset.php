<?php
namespace app\assets;

use yii\web\AssetBundle;

class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/normalize.css',
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/themify-icons.css',
        'css/flag-icon.min.css',
        'css/cs-skin-elastic.css',
        'css/bootstrap-select.css',
        'scss/style.min.css',
        'scss/widgets.css',
        'css/lib/vector-map/jqvmap.min.css',
    ];
    public $js = [
      'js/vendor/jquery-2.1.4.min.js',
      'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js',
      'js/plugins.js',
      'js/main.js',
      'js/lib/chart-js/Chart.bundle.js',
      'js/dashboard.js',
      'js/widgets.js',
      'js/lib/vector-map/jquery.vmap.js',
      'js/lib/vector-map/jquery.vmap.min.js',
      'js/lib/vector-map/jquery.vmap.sampledata.js',
      'js/lib/vector-map/country/jquery.vmap.world.js',
    ];
    /*
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    */
}

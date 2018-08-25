<?php
namespace app\assets\main;

use yii\web\AssetBundle;

class FullCalendar extends AssetBundle
{
    public $basePath = '@webroot/fullcalendar';
    public $baseUrl = '@web/fullcalendar';

    public $css = [
        'fullcalendar.min.css',
     //   'fullcalendar.print.min.css',
    ];

    public $js = [
        'lib/moment.min.js',
        'lib/jquery.min.js',
        'fullcalendar.min.js',
        'gcal.min.js',
       //'jquery-ui.min',
        'locale-all.js'
    ];  
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

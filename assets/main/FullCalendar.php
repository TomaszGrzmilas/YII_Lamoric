<?php
namespace app\assets\main;

use yii\web\AssetBundle;

class FullCalendar extends AssetBundle
{
    public $basePath = '@webroot/fullcalendar';
    public $baseUrl = '@web/fullcalendar';

    public $css = [
        'fullcalendar.min.css',
        ['fullcalendar.print.min.css', 'media' => 'print'],
    ];

    public $js = [
        'lib/moment.min.js',
        'lib/bootstrap.min.js',
        
        'fullcalendar.min.js',
       // 'gcal.min.js', google calendar
        'locale-all.js'
    ];  
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

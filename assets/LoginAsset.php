<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot/layout.main';
    public $baseUrl = '@web/layout.main';

    public $css = [
        'css/bootstrap.min.css',
        'css/hover.css',
        'css/default.css',
        'css/lightbox.css',
    ];

    public $js = [
        'javascripts/_jquery-1.11.0.min.js',
        'javascripts/bootstrap.min.js',
        'javascripts/lightbox.js',
        'javascripts/scripts.js',

    ];


}

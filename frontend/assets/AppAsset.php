<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
          'css/style.css',
    ];
    public $js = [
          'js/jquery-1.7.2.min.js',
          'js/jquery.flexslider-min.js',
          'js/jquery.validate.min.js',
          'js/scripts.js',
          'js/selectivizr.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

<?php
namespace backend\assets;

use yii\web\AssetBundle;

Class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/login/font-awesome.min.css',
        'css/login/bootstrap.min.css',
        'css/login/bootstrap-theme.min.css',
        'css/login/bootstrap-social.css',
        'css/login/templatemo_style.css'
    ];
    public $js = [

    ];
    public $depends = [
//         'yii\web\YiiAsset',
//         'yii\bootstrap\BootstrapAsset',
    ];
}
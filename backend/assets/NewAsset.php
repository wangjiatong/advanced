<?php 
namespace backend\assets;
use yii\web\AssetBundle;
use yii\web\View;


class NewAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/new/bootstrap.min.css',
        'css/new/style.css',
        'css/new/font-awesome.css',
        'css/new/icon-font.min.css',
        'css/new/animate.css',
        'css/new/graph.css',
    ];
    public $js = [
        ['js/new/echarts.min.js', 'position' => View::POS_HEAD],
//         ['https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts.min.js', 'position' => View::POS_HEAD],
        ['js/new/wow.min.js', 'position' => View::POS_HEAD],
        ['js/new/jquery-1.10.2.min.js', 'position' => View::POS_HEAD],
        ['js/new/classie.js', 'position' => View::POS_BEGIN],
        'js/new/jquery.flexisel.js',
        'js/new/jquery.flot.min.js',
        'js/new/skycons.js',
        ['js/new/uisearch.js', 'position' => View::POS_BEGIN],
        'js/new/jquery.nicescroll.js',
        'js/new/scripts.js',
        'js/new/bootstrap.min.js',//该js会导致modal闪退，取消引用则会导致菜单栏无法弹出下拉，暂时的解决办法是删除其中关于modal的部分
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
?>
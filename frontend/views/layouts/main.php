<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href=" /ewin.ico" />
</head>
<body>
<?php $this->beginBody() ?>
    
    <?php
//    NavBar::begin([
//        'brandLabel' => '上海翌银玖德资产管理有限公司',
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => [
//            'class' => 'navbar-inverse navbar-fixed-top',
//        ],
//    ]);
//    $menuItems = [
//        ['label' => '首页', 'url' => ['/site/index']],
//        ['label' => '关于我们', 'url' => ['/site/about']],
//        ['label' => '联系我们', 'url' => ['/site/contact']],
//    ];
//    if (Yii::$app->user->isGuest) {
//        //$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
//        $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
//    } else {
//        $menuItems[] = '<li>'
//            . Html::beginForm(['/site/logout'], 'post')
//            . Html::submitButton(
//                'Logout (' . Yii::$app->user->identity->username . ')',
//                ['class' => 'btn btn-link logout']
//            )
//            . Html::endForm()
//            . '</li>';
//    }
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-right'],
//        'items' => $menuItems,
//    ]);
//    NavBar::end();
    ?>
<div class="container1">
    
    <header id="navtop">
            <a href="/" class="logo fleft">
                    <img src="/img/logo.png" alt="上海翌银玖德资产管理有限公司">
            </a>

            <nav class="fright">
                    <ul>
                            <!--<li><a href="/" class="navactive">首页</a></li>-->
                            <li><a href="/" id="index">首页</a></li>
                            <li><a href="/site/about" id="about">关于我们</a></li>
                    </ul>
                    <ul>
                            <li><a href="/site/products" id="products">旗下产品</a></li>
                            <li><a href="/site/business" id="business">业务介绍</a></li>
                    </ul>
                    <ul>
                            <li><a href="/site/news" id="news">新闻动态</a></li>
                            <li><a href="/site/contact" id="contact">联系我们</a></li>
                    </ul>
                    <ul>
                            <li><a href="/site/join" id="join">加入我们</a></li>
                            <?php if(Yii::$app->user->isGuest){?><li><a href="/site/login" id="login">登录</a></li><?php }else{ ?><li><a href="/site/logout" id="login">注销<?='('.Yii::$app->user->identity->username.')'?></a></li><?php } ?>
                    </ul>
            </nav>
    </header>

    <?= $content ?>

    <div class="divide-top">
            <footer class="grid-wrap">
                    <ul class="grid col-one-third social">
                                    <li><a href="/">首页</a></li>
                                    <li><a href="/site/about">关于我们</a></li>
                                    <li><a href="/site/products">旗下产品</a></li>
                                    <li><a href="/site/business">业务介绍</a></li>
                    </ul>

                    <div class="up grid col-one-third ">
                            <a href="#navtop" title="Go back up">返回顶部&uarr;</a>
                    </div>

                    <nav class="grid col-one-third ">
                            <ul>
                                    <li><a href="/site/news">新闻动态</a></li>
                                    <li><a href="/site/contact">联系我们</a></li>
                                    <li><a href="/site/join">加入我们</a></li>
                                    <li><a href="/site/login">登录</a></li>
                            </ul>
                    </nav>
            </footer>
            <footer class="">
                &copy; <?= date('Y');?> 上海翌银玖德资产管理有限公司    <a href="http://www.miitbeian.gov.cn/">沪ICP备16046837号-1</a>
            </footer>
    </div>
    
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

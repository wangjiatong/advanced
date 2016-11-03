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
            <a href="index.html" class="logo fleft">
                    <img src="img/logo.png" alt="Designa Studio">
            </a>

            <nav class="fright">
                    <ul>
                            <li><a href="/" class="navactive">Home</a></li>
                            <li><a href="index.php?r=site%2Fabout">About</a></li>
                    </ul>
                    <ul>
                            <li><a href="index.php?r=site%2Fproducts">Products</a></li>
                            <li><a href="index.php?r=site%2Fbusiness">Business</a></li>
                    </ul>
                    <ul>
                            <li><a href="index.php?r=site%2Fnews">News</a></li>
                            <li><a href="index.php?r=site%2Fcontact">Contact</a></li>
                    </ul>
                    <ul>
                            <li><a href="index.php?r=site%2Fjoin">Join Us</a></li>
                            <li><a href="#">Login</a></li>
                    </ul>
            </nav>
    </header>

    <?= $content ?>

    <div class="divide-top">
            <footer class="grid-wrap">
                    <ul class="grid col-one-third social">
                            <li><a href="#">RSS</a></li>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="http://www.cssmoban.com/" >免费网站模板</a></li>
                            <li><a href="http://www.cssmoban.com/" title="模板之家">模板之家</a></li>
                    </ul>

                    <div class="up grid col-one-third ">
                            <a href="#navtop" title="Go back up">&uarr;</a>
                    </div>

                    <nav class="grid col-one-third ">
                            <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="works.html">Works</a></li>
                                    <li><a href="services.html">Services</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                            </ul>
                    </nav>
            </footer>
    </div>
    
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

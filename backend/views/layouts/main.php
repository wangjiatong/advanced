<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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

<div class="wrap">
    <?php
//    NavBar::begin([
//        'brandLabel' => 'My Company',
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => [
//            'class' => 'navbar-inverse navbar-fixed-top',
//        ],
//    ]);
//    $menuItems = [
//        ['label' => 'Home', 'url' => ['/site/index']],
//    ];
//    if (Yii::$app->user->isGuest) {
//        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
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
    <?php if (!Yii::$app->user->isGuest) { ?>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Strass Administration</a>
          <div class="btn-group pull-right">
			<a class="btn" href="my-profile.html"><i class="icon-user"></i> Admin</a>
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
			  <li><a href="my-profile.html">Profile</a></li>
              <li class="divider"></li>
              <li><a href="#">Logout</a></li>
            </ul>
          </div>
          <div class="nav-collapse">
            <ul class="nav">
			<li><a href="index.html">Home</a></li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="new-user.html">New User</a></li>
					<li class="divider"></li>
					<li><a href="users.html">Manage Users</a></li>
				</ul>
			  </li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Roles <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="new-role.html">New Role</a></li>
					<li class="divider"></li>
					<li><a href="roles.html">Manage Roles</a></li>
				</ul>
			  </li>
			  <li><a href="stats.html">Stats</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header"><i class="icon-wrench"></i> Administration</li>
              <li class="active"><a href="users.html">Users</a></li>
              <li><a href="roles.html">Roles</a></li>
              <li class="nav-header"><i class="icon-signal"></i> Statistics</li>
              <li><a href="stats.html">General</a></li>
              <li><a href="user-stats.html">Users</a></li>
              <li><a href="visitor-stats.html">Visitors</a></li>
              <li class="nav-header"><i class="icon-user"></i> Profile</li>
              <li><a href="my-profile.html">My profile</a></li>
              <li><a href="#">Settings</a></li>
			  <li><a href="#">Logout</a></li> 
            </ul>
          </div>
        </div>
    <?php } ?>
          
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<!--<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>-->
    </div>

    <hr>

    <footer class="well" style="fixed-bottom">
      &copy; Strass - More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>
    </footer>
    
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

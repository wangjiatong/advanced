<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\controllers\common\BaseController;
use backend\models\Admin;

AppAsset::register($this);
$my_id = Yii::$app->user->identity->id;
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
    <?php if (!Yii::$app->user->isGuest) {?>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="/">网站管理后台</a>
          <div class="btn-group pull-right">
              <a class="btn" href="#"><i class="icon-user"></i><?= Yii::$app->user->identity->username ?>(<?= Admin::findOne($my_id)->name ?>)</a>
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
			  <!--<li><a href="#">个人资料</a></li>-->
              <!--<li class="divider"></li>-->
              <li><a href="<?= '/site/logout'?>">注销</a></li>
            </ul>
          </div>
<!--          <div class="nav-collapse">
            <ul class="nav">
			<li><a href="http://246867.ichengyun.net:83/">后台首页</a></li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">用户 <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#">管理员</a></li>
					<li class="divider"></li>
					<li><a href="#">会员</a></li>
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
          </div>-->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
                <li class="nav-header"><i class="icon-wrench"></i> 管理员功能</li>
                <!--<li class="active"><a href="#">添加管理员</a></li>-->
                <li class=""><a href="/admin">管理员列表</a></li>
                <li class=""><a href="/role">角色列表</a></li>
                <li class=""><a href="/role/set">设置角色</a></li>
                <li class=""><a href="/access">权限列表</a></li>
                <li class=""><a href="/access/set">设置权限</a></li>
                <li class="nav-header"><i class="icon-user"></i> 个人中心</li>
                <li class=""><a href="/admin/reset-passwd">修改密码</a></li>
                <li class=""><a href="/site/request-password-reset">忘记密码</a></li>
                <li class=""><a href="/admin/my-update">修改信息</a></li>
                <li class="nav-header"><i class="icon-user"></i> 客户管理</li>
                <!--<li class=""><a href="#">添加会员</a></li>-->
                <li class=""><a href="/user/index">客户列表</a></li>
                <li class=""><a href="/user/my-user">我的客户</a></li>
                <li class="nav-header"><i class="icon-signal"></i> 旗下产品</li>
                <!--<li><a href="#">添加分类</a></li>-->
                <li><a href="/product/product-column-index">产品分类列表</a></li>
                <!--<li><a href="#">添加产品</a></li>-->
                <li><a href="/product/index">产品列表</a></li>
                <li class="nav-header"><i class="icon-signal"></i> 合同管理</li>
                <!--<li><a href="#">添加分类</a></li>-->
                <li><a href="/contract/index">合同列表</a></li>
                <li><a href="/contract/my-contract">我的合同</a></li>
                <li class="nav-header"><i class="icon-signal"></i> 新闻动态</li>
                <li><a href="/news/add-column">新增新闻分类</a></li>
                <li><a href="/news/manage-news-columns">新闻分类列表</a></li>
                <li><a href="/news/post">发布新闻</a></li>
                <li><a href="/news/index">新闻列表</a></li>
                <!--<li class="nav-header"><i class="icon-signal"></i> 联系我们</li>-->
                <!--<li><a href="#">查看邮件</a></li>-->
            </ul>
          </div>
        </div>
    <?php } ?>
          
    <!--<div class="container">-->
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    <div class="span9">
        <?= $content ?>
    </div>
    <!--</div>-->
</div>

<!--<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>-->
    </div>

    <hr>

    <footer class="well">
      &copy; <?= date('Y');?> 上海翌银玖德资产管理有限公司
    </footer>
    
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

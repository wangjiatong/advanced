<?php 
use backend\assets\NewAsset;
use yii\helpers\Html;
use backend\models\Admin;
use common\models\UserModel;
use backend\controllers\common\BaseController;
NewAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html lang="<?= Yii::$app->language ?>">
<head>
<title><?= Html::encode($this->title) ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="<?= Yii::$app->charset ?>">
<?= Html::csrfMetaTags() ?>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<?php $this->head() ?>
<script>
	 new WOW().init();
</script>
<link rel="shortcut icon" href=" /ewin.ico" />
</head>

<body class="sticky-header left-side-collapsed"  onload="initMap()">
<?php $this->beginBody() ?>
<section>
<!-- left side start-->
	<div class="left-side sticky-left-side">

		<!--logo and iconic logo start-->
		<div class="logo">
			<h1><a href="/"> 翌银<span>玖德</span></a></h1>
		</div>
		<div class="logo-icon text-center">
			<a href="/"><i class="lnr lnr-home"></i> </a>
		</div>

		<!--logo and iconic logo end-->
		<div class="left-side-inner">

			<!--sidebar nav start-->
				<ul class="nav nav-pills nav-stacked custom-nav">
					<li class="menu-list">
						<a href="#"><i class="lnr lnr-cog"></i><span>管理员</span></a>
						<ul class="sub-menu-list">
							<li><a href="/admin">管理员管理</a> </li>
							<li><a href="/role">角色管理</a></li>
							<li><a href="/role/set">角色设置</a> </li>
							<li><a href="/access">权限管理</a></li>
							<li><a href="/access/set">权限设置</a> </li>
						</ul>
					</li>
					<li class="menu-list">
			            <a href="#"><i class="lnr lnr-file-empty"></i> <span>新闻</span></a>
						<ul class="sub-menu-list">
							<li><a href="/news/add-column">增加分类</a> </li>
							<li><a href="/news/manage-news-columns">分类管理</a></li>
							<li><a href="/news/post">发布新闻</a> </li>
							<li><a href="/news">新闻管理</a></li>
						</ul>
					</li>
					<li class="menu-list">
						<a href="#"><i class="lnr lnr-user"></i> <span>个人</span></a>
						<ul class="sub-menu-list">
							<li><a href="/admin/reset-passwd">修改密码</a> </li>
							<li><a href="/site/request-password-reset">忘记密码</a></li>
							<li><a href="/admin/my-update">修改信息</a> </li>
						</ul>
					</li>             
					<li class="menu-list">
				      <a href="#"><i class="lnr lnr-gift"></i> <span>产品</span></a>
				      <ul class="sub-menu-list">
							<li><a href="/product/product-column-index">分类列表</a> </li>
							<li><a href="/product/index">产品管理</a></li>
				      </ul>
					</li>      
					<li class="menu-list">
					    <a href="#"><i class="lnr lnr-users"></i> <span>客户</span></a>  
						<ul class="sub-menu-list">
							<li><a href="/user">客户管理</a> </li>
							<li><a href="/user/my-user">我的客户</a> </li>
						</ul>
					</li>
					<li class="menu-list">
					    <a href="#"><i class="lnr lnr-license"></i> <span>合同</span></a>  
						<ul class="sub-menu-list">
							<li><a href="/contract/index">合同管理</a> </li>
							<li><a href="/contract/my-contract">我的合同</a> </li>
						</ul>
					</li>
					<li><a href="/statistic/overall"><i class="lnr lnr-flag"></i> <span>统计</span></a></li>
				</ul>
			<!--sidebar nav end-->
		</div>
	</div>
	<!-- left side end-->

	<!-- main content start-->
	<div class="main-content">
		<!-- header-starts -->
		<div class="header-section">
		 
		<!--toggle button start-->
		<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
		<!--toggle button end-->

		<!--notification menu start -->
		<div class="menu-right">
			<div class="user-panel-top">  	
			<?php if(in_array('contract/index', Yii::$app->session['allowed_urls'])
            || in_array('contract/my-contract', Yii::$app->session['allowed_urls'])): ?>
				<div class="profile_details_left">
					<ul class="nofitications-dropdown">
<!-- 						<li class="dropdown"> -->
<!-- 							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge"></span></a> -->
								
<!-- 									<ul class="dropdown-menu"> -->
<!-- 										<li> -->
<!-- 											<div class="notification_header"> -->
<!-- 												<h3></h3> -->
<!-- 											</div> -->
<!-- 										</li> -->
<!-- 										<li><a href="#"> -->
<!-- 										   <div class="user_img"><img src="img/new/1.png" alt=""></div> -->
<!-- 										   <div class="notification_desc"> -->
<!-- 											<p>Lorem ipsum dolor sit amet</p> -->
<!-- 											<p><span>1 hour ago</span></p> -->
<!-- 											</div> -->
<!-- 										   <div class="clearfix"></div>	 -->
<!-- 										 </a></li> -->
<!-- 										<li> -->
<!-- 											<div class="notification_bottom"> -->
<!-- 												<a href="#"></a> -->
<!-- 											</div>  -->
<!-- 										</li> -->
<!-- 									</ul> -->
<!-- 						</li> -->
<!-- 						<li class="login_box" id="loginContainer"> -->
<!-- 								<div class="search-box"> -->
<!-- 									<div id="sb-search" class="sb-search"> -->
<!-- 										<form> -->
<!-- 											<input class="sb-search-input" placeholder="" type="search" id="search"> -->
<!-- 											<input class="sb-search-submit" type="submit" value=""> -->
<!-- 											<span class="sb-icon-search"> </span> -->
<!-- 										</form> -->
<!-- 									</div> -->
<!-- 								</div> -->
<!-- 						</li> -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue"><?= count(Yii::$app->session['contractToPay']) == 0 ? null : count(Yii::$app->session['contractToPay']) ?></span></a>
								<ul class="dropdown-menu">
									<li>
										<div class="notification_header">
											<h3>近15天你有<?= count(Yii::$app->session['contractToPay']) ?>个待付合同</h3>
										</div>
									</li>
									<?php if(Yii::$app->session['contractToPay']){ 
								           foreach (Yii::$app->session['contractToPay'] as $model):
									?>
									<li><a href="<?= BaseController::checkUrlAccess('contract/view', 'contract/my-view') ?>?id=<?= $model->cid ?>">
<!-- 										<div class="user_img"><img src="img/new/1.png" alt=""></div> -->
									   <div class="notification_desc">
										<p><?= '【' . $model->time . '】' . number_format($model->interest, 2) . '元' ?></p>
										<p><span><?= '【' . Admin::findOne($model->source)->name . '】' . UserModel::getName($model->uid) ?></span></p>
										</div>
									  <div class="clearfix"></div>	
									 </a></li>
									 <?php endforeach; }?>
									 <li>
										<div class="notification_bottom">
											<a href="#"></a>
										</div> 
									</li>
								</ul>
						</li>	
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1"></span></a>
								<ul class="dropdown-menu">
									<li>
										<div class="notification_header">
											<h3>业绩进度</h3>
										</div>
									</li>
									<li><a href="#">
											<div class="task-info">
											<span class="task-desc"><?= date('n') ?>月<?= '（' . number_format(Yii::$app->session['monTask']['val']) .'元）' ?></span><span class="percentage"><?= Yii::$app->session['monTask']['per'] ?></span>
											<div class="clearfix"></div>	
										   </div>
											<div class="progress progress-striped active">
											 <div class="bar <?= Yii::$app->session['monTask']['color'] ?>" style="width: <?= Yii::$app->session['monTask']['per'] ?>;"></div>
										</div>
									</a></li>
									<li><a href="#">
										<div class="task-info">
											<span class="task-desc"><?= date('Y') ?>年<?= '（' . number_format(Yii::$app->session['yearTask']['val']) .'元）' ?></span><span class="percentage"><?= Yii::$app->session['yearTask']['per'] ?></span>
										   <div class="clearfix"></div>	
										</div>
									   
										<div class="progress progress-striped active">
											 <div class="bar <?= Yii::$app->session['yearTask']['color'] ?>" style="width: <?= Yii::$app->session['yearTask']['per'] ?>;"></div>
										</div>
									</a></li>
									<li>
										<div class="notification_bottom">
											<a href="#"></a>
										</div> 
									</li>
								</ul>
						</li>		   							   		
						<div class="clearfix"></div>	
					</ul>
				</div>
				<?php endif; ?>
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span style="background:url(/img/new/1.jpg) no-repeat center"> </span> 
									 <div class="user-name">
										<p><?= Yii::$app->user->identity->username ?><span><?= Admin::getName(Yii::$app->user->identity->id) ?></span></p>
									 </div>
									 <i class="lnr lnr-chevron-down"></i>
									 <i class="lnr lnr-chevron-up"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
<!-- 									<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>  -->
<!-- 									<li> <a href="#"><i class="fa fa-user"></i>Profile</a> </li>  -->
								<li> <a href="/site/logout"><i class="fa fa-sign-out"></i> 注销</a> </li>
							</ul>
						</li>
						<div class="clearfix"> </div>
					</ul>
				</div>		
				<div class="clearfix"></div>
			</div>
		  </div>
		<!--notification menu end -->
		</div>
	<!-- //header-ends -->
		<div id="page-wrapper">
			<div class="graphs">
                <?= $content ?>
			</div>
		<!--body wrapper start-->
		</div>
		 <!--body wrapper end-->
	</div>
    <!--footer section start-->
<!-- 		<footer> -->
<!-- 		   <p>Copyright &copy;  上海翌银玖德资产管理有限公司</p> -->
<!-- 		</footer> -->
    <!--footer section end-->
  <!-- main content end-->
</section>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
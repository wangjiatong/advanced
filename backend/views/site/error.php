<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>

<div class="error-main">
	<h3><i class="fa fa-exclamation-triangle"></i> <span><?= Html::encode($this->title) ?></span></h3>
	<div class="col-xs-7 error-main-left">
		<span>哎呀...！</span>
		<p><?= nl2br(Html::encode($message)) ?></p>
		<div class="error-btn">
			<a href="/">回到主页？</a>
		</div>
	</div>
	<div class="col-xs-5 error-main-right">
		<img src="/img/new/7.png" alt=" " class="img-responsive" />
	</div>
	<div class="clearfix"> </div>
</div>

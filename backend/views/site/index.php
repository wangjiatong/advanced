<?php

/* @var $this yii\web\View */

$this->title = '网站管理后台';
use backend\controllers\common\BaseController;
use common\models\UserModel;
use common\models\Contract;
?>

<!--<div class="span9">-->
    <!--模板body开始-->
          <div class="well hero-unit">
            <h1>欢迎, <?= BaseController::getUserName() ?></h1>
            <p></p>
            <p>今天是<?=date('Y').'年'.date('m').'月'.date('d').'日'?></p>
            <p><a class="btn btn-success btn-large" href="<?= BaseController::checkUrlAccess('contract/index', 'contract/my-contract')?>">查看合同 &raquo;</a></p>
          </div>
          <div class="row-fluid">
            <div class="span3">
              <h3>我的客户</h3>
              <p><a href="user/my-user" class="badge badge-inverse"><?= UserModel::find()->where(['source' => BaseController::getUserId()])->count()?></a></p>
            </div>
            <div class="span3">
              <h3>我的合同</h3>
              <p><a href="contract/my-contract" class="badge badge-inverse"><?= Contract::find()->where(['source' => BaseController::getUserId()])->count()?></a></p>
            </div><!--
            <div class="span3">
              <h3>Pending</h3>
			  <p><a href="users.html" class="badge badge-inverse">2</a></p>
            </div>
            <div class="span3">
              <h3>Roles</h3>
			  <p><a href="roles.html" class="badge badge-inverse">3</a></p>
            </div>-->
          </div>
		  <br />
		  <div class="row-fluid">
			<div class="page-header">
				<h1>最近待付合同 <small></small</h1>
			</div>
			<table class="table table-bordered">
                                <?php if(isset($models)){ ?>
				<thead>
					<tr>
						<th>合同编号</th>
						<th>客户姓名</th>
						<th>每期到期时间</th>
						<th>每期应付利息</th>
<!--						<th>City</th>
						<th>Role</th>
						<th>Status</th>
						<th>Actions</th>-->
					</tr>
				</thead>
				<tbody>
                                <?php foreach ($models as $m){ ?>
				<tr class="pending-user">
					<td><?= $m->contract_number ?></td>
                                        <td><?= UserModel::findOne($m->user_id)->name ?></td>
					<td><?= $m->every_time ?></td>
					<td><?= $m->every_interest ?></td>
<!--					<td>Bassett, NE</td>
					<td>User</td>
					<td><span class="label label-important">Inactive</span></td>
					<td><span class="user-actions"><a href="javascript:void(0);" class="label label-success">Approve</a> <a href="javascript:void(0);" class="label label-important">Reject</a></span></td>-->
				</tr>
                                <?php } ?>
                                <?php }else{ ?>
                                <?='<p>最近无待付合同！</p>'?>
                                <?php } ?>
				</tbody>
			</table>
		  </div>
                  
        <!--</div>-->
    <!--模板body结束-->
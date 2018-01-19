<?php
use yii\helpers\Html;
use common\models\UserModel;
use backend\models\Admin;
use common\models\Contract;
use yii\widgets\LinkPager;
use backend\controllers\common\BaseController;
use Yii;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?= Html::a('返回客户列表', Yii::$app->request->referrer, [
    'class' => 'btn btn-primary',
])?>
<p></p>
<table class="table table-striped">
    <thead>
        <tr>
            <th>本金</th>
            <th>客户姓名</th>
            <th>成立时间</th>
            <th>兑付时间</th>
            <th>客户经理</th>
            <th>合同状态</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($model as $m):?>
        <?= "<tr><td>".$m->capital."</td><td>".UserModel::findOne($m->user_id)->name."</td><td>".$m->found_time."</td><td>".$m->cash_time."</td><td>".Admin::findOne($m->source)->name."</td><td>".Contract::findOne($m->id)->getStatus()."</td><td>".Html::a('详情', ['contract/view', 'id' => $m->id])."</td></tr>"?>
    <?php endforeach;?>
        <?= LinkPager::widget(['pagination' => $pages]); ?>
    </tbody>
</table>
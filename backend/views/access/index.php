<?php
use yii\grid\GridView;
use yii\helpers\Html;
use backend\models\RoleAccess;
use backend\models\Role;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->title = '权限管理';
?>
<div class="acess-index">
    <h1><?= Html::encode($this->title); ?></h1>
    
    <p><?= Html::a('新增权限', ['access/create'], ['class' => 'btn btn-success']) ?></p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'access_name',
//            'urls',
//            'status',
//            'created_time',
//            'updated_time',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

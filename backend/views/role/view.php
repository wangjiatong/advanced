<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Role */

$this->title = '角色详情';
//$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'role_name',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

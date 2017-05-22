<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UserModel */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'User Models', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['my-update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['my-delete', 'id' => $model->id], [
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
            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            'email:email',
            'status',
            'created_at:date',
            'updated_at:date',
            'name',
//            'sex',
            [
                'label' => '性别',
                'attribute' => 'sex',
                'value' => function($data){
                    return common\models\UserModel::getSex($data->sex);
                }
            ],
            'birthday',
            'phone_number',
        ],
    ]) ?>

</div>

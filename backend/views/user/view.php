<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Admin;

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
                'confirm' => '你确定要删除该客户吗？',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('修改密码', ['reset-passwd', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
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
                'value' => function($data){
                    return common\models\UserModel::getSex($data->id);
                }
            ],
            [
                'label' => '客户经理',
                'value' => function($data){
                    if($data->source)
                    {
                        return Admin::find()->where(['id' => $data->source])->one()->name;
                    }else{
                        return null;
                    }
                }
            ],
            'birthday',
            'phone_number',
        ],
    ]) ?>

</div>

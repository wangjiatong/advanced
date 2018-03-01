<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\RoleAccess;
use backend\models\Access;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '角色管理';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">

    <h3>
        <?= Html::encode($this->title) ?>
        <?= Html::a('新增角色', ['create'], ['class' => 'btn btn-success']) ?>
    </h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'role_name',
            [
                'label' => '角色权限',
                'value' => function($data){
                    $access_ids = RoleAccess::find()->select('access_id')->where(['role_id' => $data->id])->asArray()->all();
                    if($access_ids)
                    {
                        foreach($access_ids as $a_i)
                        {
                            $access = Access::find()->where(['id' => $a_i])->one();
                            $access_name_arr[] = $access->access_name;
                        }
                            $access_name_str = implode(', ', $access_name_arr);
                            return $access_name_str;
                    }
                    return null;
                },
            ],
            [
                'label' => '撤销权限',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a('操作', ['access/manage', 'id' => $data->id], ['class' => 'btn btn-info btn-xs']);
                },
            ],
//            'status',
//            'created_at',
//            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'options' => [
            'class' => 'table',
        ],
        'tableOptions' => [
            'class' =>'table table-hover table-bordered',
            'style' => 'table-layout: fixed;',
        ],
    ]); ?>
</div>

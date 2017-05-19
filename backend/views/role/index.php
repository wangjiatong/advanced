<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\RoleAccess;
use backend\models\Access;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '角色列表';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增角色', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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
                    return Html::a('编辑', ['access/manage', 'id' => $data->id]);
                },
            ],
//            'status',
//            'created_at',
//            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

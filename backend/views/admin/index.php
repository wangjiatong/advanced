<?php
use yii\grid\GridView;
use yii\helpers\Html;
use backend\models\Role;
use backend\models\UserRole;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->title = '管理员管理';
?>
<div class="admin-index">

    <h3>
        <?= Html::encode($this->title) ?>
        <?= Html::a('新增管理员', ['create'], ['class' => 'btn btn-success']) ?>
    </h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'email',
//            'status',
            [
                'label' => '用户角色',
                'value' => function($data){
                    $role_ids = UserRole::find()->select('role_id')->where(['user_id' => $data->id])->asArray()->all();   
                    if($role_ids)
                    {
                        foreach ($role_ids as $role_id)
                        {
                            $role = Role::find()->where(['id' => $role_id])->one();
                            $role_name = $role->role_name;
                            $role_name_arr[] = $role_name;                       
                        }
                        return implode(" ", $role_name_arr);
                    }
                    return null;
                },
            ],
            [
                'label' => '撤销角色',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a('操作', ['role/manage', 'id' => $data->id], ['class' => 'btn btn-info btn-xs']);
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
//            [
//                'label' => '修改密码',
//                'format' => 'raw',
//                'value' => function($data){
//                    return Html::a('修改', ['admin/reset-passwd', 'id' => $data->id]);
//                },
//            ],
        ],
        'options' => [
            'class' => 'table',    
        ],
        'tableOptions' => [
            'class' =>'table table-hover table-bordered',
            'style' => 'table-layout: fixed;',
        ],
    ])?>

</div>
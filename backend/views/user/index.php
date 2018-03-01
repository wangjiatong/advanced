<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\controllers\common\BaseController;
use backend\models\Admin;
use common\models\Contract;
use common\models\UserModel;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$uri = Yii::$app->controller->id.'/'.Yii::$app->controller->action->id;
switch ($uri)
{
    case 'user/index': 
        $user_list = UserModel::find()->select('name')->indexBy('name')->column(); 
        $this->title = '客户管理';
        break;
    case 'user/my-user': 
        $user_list = UserModel::find()->select('name')->where(['source' => Yii::$app->user->identity->id])->indexBy('name')->column(); 
        $this->title = '我的客户';
        break;     
}
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-model-index">

    <h3>
        <?= Html::encode($this->title) ?>
        <?= Html::a('新增客户', ['create'], ['class' => 'btn btn-success']) ?>
    </h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php Pjax::begin(); ?>    
    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'name',
                    'label' => '姓名',
                    'filter' => Select2::widget([
                        'model' => $searchModel,
                        'attribute' => 'name',
                        'data' => $user_list,
                        'options' => [
                            'placeholder' => '',
                        ],
                    ]),
                ],

                [
                    'attribute' => 'admin_name',
                    'value' => 'admin.name',
                    'label' => '客户经理',
                    'filter' => Select2::widget([
                        'model' => $searchModel,
                        'attribute' => 'admin_name',
                        'data' => Admin::find()->select('name')->indexBy('name')->column(),
                        'options' => [
                            'placeholder' => '',
                        ],
                    ]),
                    'visible' => $uri == 'user/index',
                ],
                
//                 [
//                     'label' => '性别',
//                     'attribute' => 'sex',
//                     'value' => function($data){
//                         return common\models\UserModel::getSex($data->id);
//                     }
//                 ],
                [
                    'label' => '查看名下合同',
                    'format' => 'raw',
                    'value' => function($data){
                        $count = Contract::find()->where(['user_id' => $data->id])->count();
                        $url = BaseController::checkUrlAccess('user/all-contract-by-user', 'user/my-contract-by-user');
                        return Html::a('查看', [$url, 'id' => $data->id], ['class' => 'btn btn-success']) . "(共{$count}条记录）";
                    },
                ],                
                [
                    'label' => '操作',
                    'format' => 'raw',
                    'value' => function($data){
                        $url = BaseController::checkUrlAccess('user/view', 'user/my-view');
                        return Html::a('详情', [$url, 'id' => $data->id], ['class' => 'btn btn-info']);
                    },
                ],
            ],
            'tableOptions' => [
                'class' => 'table table-bordered table-condensed table-hover',
            ],
            'options' => [
                'class' => 'table',
            ],
        ]); ?>
    <?php Pjax::end(); ?>

</div>

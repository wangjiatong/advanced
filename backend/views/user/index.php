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

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增客户', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
//             'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',
//              'name',
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
//             'sex',
//            [
//                'label' => '性别',
//                'attribute' => 'sex',
//                'value' => function($data){
//                    return common\models\UserModel::getSex($data->id);
//                }
//            ],
//             'birthday',
//             'phone_number',
//            'source',
//             [
//                 'label' => '客户经理',
//                 'value' => function($data){
//                     if($data->source)
//                     {
//                         return Admin::find()->where(['id' => $data->source])->one()->name;
//                     }else{
//                         return null;
//                     }
//                 },
//                 'visible' => $uri == 'user/index',
//             ],
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
            [
                'label' => '操作',
                'format' => 'raw',
                'value' => function($data){
                    $url = BaseController::checkUrlAccess('user/view', 'user/my-view');
                    return Html::a('详情', [$url, 'id' => $data->id], ['class' => 'btn btn-info']);
                },
            ],
            [
                'label' => '查看名下合同',
                'format' => 'raw',
                'value' => function($data){
                    $count = Contract::find()->where(['user_id' => $data->id])->count();
                    $url = BaseController::checkUrlAccess('user/all-contract-by-user', 'user/my-contract-by-user');
                    return Html::a('查看', [$url, 'id' => $data->id], ['class' => 'btn btn-success']) . "(共{$count}条记录）";
                },
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

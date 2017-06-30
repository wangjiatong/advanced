<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\controllers\common\BaseController;
use backend\models\Admin;
use common\models\Contract;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '客户列表';
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
             'name',
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
            [
                'label' => '操作',
                'format' => 'raw',
                'value' => function($data){
                    $url = BaseController::checkUrlAccess('user/view', 'user/my-view');
                    return Html::a('详情', $url."?id=".$data->id);
                },
            ],
            [
                'label' => '查看合同',
                'format' => 'raw',
                'value' => function($data){
                    $count = Contract::find()->where(['user_id' => $data->id])->count();
                    $url = BaseController::checkUrlAccess('user/all-contract-by-user', 'user/my-contract-by-user');
                    return Html::a('查看(共'.$count.'条记录）', [$url, 'id' => $data->id]);
                },
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

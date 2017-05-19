<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\controllers\common\BaseController;
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

            'id',
            'username',
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
//                    return common\models\UserModel::getSex($data->sex);
//                }
//            ],
//             'birthday',
//             'phone_number',
            'source',

            ['class' => 'yii\grid\ActionColumn'],
            [
                'label' => '更多操作',
                'format' => 'raw',
                'value' => function($data){
                    $url = BaseController::checkUrlAccess('user/view', 'user/my-view');
                    return Html::a('详情', $url."?id=".$data->id);
                },
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

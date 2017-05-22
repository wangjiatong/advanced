<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\ProductColumn;
use common\models\UserModel;
use backend\controllers\common\BaseController;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ContractSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '合同列表';

?>
<div class="contract-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增合同', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'contract_number',
//            'capital',
            'transfered_time:date',
            'found_time:date',
            // 'raise_day',
            // 'raise_interest',
             'cash_time:date',
            // 'term_month',
            // 'interest',
            // 'term',
            // 'every_time',
            // 'every_interest',
            // 'total_interest',
            // 'total',
            // 'bank',
            // 'bank_number',
//             'source',
            // 'created_at',
            // 'updated_at',
//             'product_id',
//            [
//                'label' => '产品名称',
//                'attribute' => 'product_id',
//                'value' => function($data){
//                    if($data){
//                        return ProductColumn::findOne($data)->product_column;
//                    }else{
//                        return '不存在的';
//                    }
//                }
//            ],
//             'user_id',
            [
                'label' => '客户姓名',
//                'attribute' => 'user_id',
                'value' => function($data){
                   if($data){
                       return UserModel::findOne($data->user_id)->name;
                   }else{
                       return '不存在的';
                   }
                }
            ],
//             'status',
//            [
//                'label' => '合同状态',
//                'attribute' => 'status',
//                'value' => function($data){
//                    switch ($data->status)
//                    {
//                    case 1: 
//                        return '生效中';
//                        break;
//                    case 0:
//                        return '已过期';
//                        break;
//                    default:
//                        return '错误';
//                    }
//                }
//            ],
//            [
//                'label' => '合同状态',
//                'attribute' => 'status',
//                'value' => function($data){
//                    return common\models\Contract::contractValidation($data->status);
//                }
//            ],
//            ['class' => 'yii\grid\ActionColumn'],
            [
                'label' => '',
                'format' => 'raw',
                'value' => function($data){
                    $url = BaseController::checkUrlAccess('contract/view', 'contract/my-view');
                    return Html::a('详情', $url."?id=".$data->id);
                },
            ],
//            [
//                'label' => '',
//                'format' => 'raw',
//                'value' => function($data){
//                    $url = BaseController::checkUrlAccess('contract/update', 'contract/my-update');
//                    return Html::a('修改', $url."?id=".$data->id);
//                },
//            ],
//            [
//                'label' => '',
//                'format' => 'raw',
//                'value' => function($data){
//                    $url = BaseController::checkUrlAccess('contract/delete', 'contract/my-delete');
//                    return Html::a('删除', $url."?id=".$data->id);
//                },
//            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

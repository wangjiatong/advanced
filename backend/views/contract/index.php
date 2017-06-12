<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Product;
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
        <?= Html::a('导出Excel', ['excel'], ['class' => 'btn btn-success']) ?>
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
//             'cash_time:date',
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
            [
                'label' => '产品名称',
                'value' => function($data){
                    if($data->product_id){
                        return Product::findOne($data->product_id)->product_name;
                    }else{
                        return null;
                    }
                }
            ],
            [
                'label' => '客户姓名',
                'value' => function($data){
                   if($data){
                       return UserModel::findOne($data->user_id)->name;
                   }else{
                       return null;
                   }
                }
            ],
//             'status',
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
//                    $url = BaseController::checkUrlAccess('contract/delete', 'contract/my-delete');
//                    return Html::a('删除', $url."?id=".$data->id);
//                },
//            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

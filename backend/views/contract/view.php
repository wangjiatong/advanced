<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Admin;
use common\models\Product;
use common\models\UserModel;
use common\models\Contract;

$pdfUrl = "<embed width='1000' height='750' src='/$model->pdf'></embed>";


/* @var $this yii\web\View */
/* @var $model common\models\Contract */

$this->title = '合同详情：'.$model->contract_number;

?>
<div class="contract-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['my-update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['my-delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'contract_number',
            'capital',
            'transfered_time',
            'found_time',
            'raise_day',
            'raise_interest_year',
            'raise_interest',
            'cash_time',
            'term_month',
            'interest_year',
            'interest',
//            'term',
            [
                'label' => '付息频率',
                'value' => function($data){
                    switch($data->term)
                    {
                        case 3: return '季度';                            break;
                        case 6: return '半年';                            break;
                        case 1: return '一次性';                            break;
                    }
                },
            ],
            'every_time',
            'every_interest',
            'total_interest',
            'total',
            'bank',
            'bank_user',
            'bank_number',
//            'source',
            [
                'label' => '客户经理',
                'value' => function($data){
                    if($data->source)
                    {
                        return Admin::findOne($data->source)->name;
                    }else{
                        return null;
                    }
                },
            ],
            'created_at',
//            'updated_at',
//            'product_id',
            [
                'label' => '产品名称',
//                'attribute' => 'product_id',
                'value' => function($data){
                    if($data->product_id)
                    {
                        return Product::findOne($data->product_id)->product_name;
                    }else{
                        return null;
                    }
                },
            ],
//            'user_id',
            [
                'label' => '客户姓名',
//                'attribute' => 'user_id',
                'value' => function($data){
                    if($data->user_id)
                    {
                        return UserModel::findOne($data->user_id)->name;
                    }else{
                        return null;
                    }
                },
            ],
//            'status',
            [
                'label' => '合同状态',
//                'attribute' => 'status',
                'value' => function($data){
                    if($data->status)
                    {
                        return Contract::contractValidation($data->status);
                    }else{
                        return null;
                    }
                },
            ],
//            'pdf',
            [
                'label' => '合同扫描件',
                'value' => $pdfUrl,
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>

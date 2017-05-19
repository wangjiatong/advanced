<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$pdfUrl = "<embed width='1000' height='750' src='/$model->pdf'></embed>";


/* @var $this yii\web\View */
/* @var $model common\models\Contract */

$this->title = '合同详情：'.$model->contract_number;

?>
<div class="contract-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
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
            'raise_interest',
            'cash_time',
            'term_month',
            'interest',
            'term',
            'every_time',
            'every_interest',
            'total_interest',
            'total',
            'bank',
            'bank_number',
            'source',
            'created_at',
            'updated_at',
//            'product_id',
            [
                'label' => '产品名称',
                'attribute' => 'product_id',
                'value' => function($data){
                    return \common\models\Product::findOne($data)->product_name;
                }
            ],
//            'user_id',
            [
                'label' => '客户姓名',
                'attribute' => 'user_id',
                'value' => function($data){
                    return common\models\UserModel::findOne($data)->name;
                }
            ],
//            'status',
            [
                'label' => '合同状态',
                'attribute' => 'status',
                'value' => function($data){
                    return common\models\Contract::contractValidation($data->status);
                }
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

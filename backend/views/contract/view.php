<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Contract */

$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Contracts', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
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
            'product_id',
            'user_id',
            'status',
        ],
    ]) ?>

</div>

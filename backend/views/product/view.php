<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//
//use common\models\Product;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//print_r($model->productColumn);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定要删除该产品吗？',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'product_name',
            'raise_interest_year',
            'interest_year',
//            'product_column_id', 
                [
                    'label' => '产品分类',
                    'value' => $model->productColumn['product_column'],
                ],
        ],
    ]) ?>

</div>

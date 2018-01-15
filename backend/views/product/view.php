<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//
//use common\models\Product;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = '产品详情——'. $model->product_name;
//$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//print_r($model->productColumn);
$imgUrl = constant('FRONTEND') . '/' . $model->img;
$status = $model->status;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a($status ? '停售' : '开售', [$status ? 'stop-selling' : 'start-selling', 'id' => $model->id], [
            'class' => $status ? 'btn btn-danger' : 'btn btn-warning',
            'data' => [
                'confirm' => $status ? '你确定要停售该产品吗？' : '你确定要恢复销售该产品吗？',
                'method' => 'post',
            ],
        ]) ?>
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
            [
                'label' => '产品状态',
                'value' => $model->getStatus(),  
            ],
            'content:html',
//            'img:html',
//            'product_column_id', 
                [
                    'label' => '产品分类',
                    'value' => $model->productColumn['product_column'],
                ],
                [
                'label' => '产品图片',
                'value' => "<img src='$imgUrl' width='320px' height='100px'>",
                'format' => 'html',
                ],
        ],
    ]) ?>

</div>

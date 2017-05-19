<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductColumns */

$this->title = '产品分类——'.$model->product_column;
//$this->params['breadcrumbs'][] = ['label' => '产品分类', 'url' => ['index-product-columns']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-columns-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['product-column-update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['product-column-delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定要删除该分类吗？',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'product_column',
        ],
    ]) ?>

</div>

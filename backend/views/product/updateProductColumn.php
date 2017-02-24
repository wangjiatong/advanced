<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductColumns */

$this->title = '修改产品分类: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Product Columns', 'url' => ['index-product-columns']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view-product-columns', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = '修改';
?>
<div class="product-columns-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formProductColumn', [
        'model' => $model,
    ]) ?>

</div>

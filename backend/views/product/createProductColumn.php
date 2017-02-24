<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProductColumns */

$this->title = '创建产品分类';
//$this->params['breadcrumbs'][] = ['label' => 'Product Columns', 'url' => ['index-product-columns']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-columns-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formProductColumn', [
        'model' => $model,
    ]) ?>

</div>
